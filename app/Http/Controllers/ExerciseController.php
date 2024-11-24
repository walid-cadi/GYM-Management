<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());
        $file = $request->image;
        $fileName = hash("sha256", file_get_contents($file)) . "." . $file->getClientOriginalExtension();
        $file->move(storage_path("app/public/images/exercise"), $fileName);

        Exercise::create([
            "image" => $fileName,
            "name" => $request->name,
            "calories_burned" => $request->calories_burned,
            "sesion_id" => $request->sesion_id
        ]);

        return back();

    }

        public function updateExerciseStatusdone(Request $request, $exerciseId)
{
    $user = auth()->user();
    $exercise = Exercise::findOrFail($exerciseId);

    // Check if the exercise is already attached to the user
    $exists = $user->exercises()->wherePivot('exercise_id', $exerciseId)->exists();

    if ($exists) {
        // Update the pivot table if the exercise already exists
        $user->exercises()->updateExistingPivot($exerciseId, ['is_done' => true]);

        // Subtract the calories burned from the user's goal
        $caloriesBurned = $exercise->calories_burned;
        $remainingCalories = max(0, $user->calories - $caloriesBurned); // Ensure remaining calories don't go negative
        $user->calories = $remainingCalories;
    } else {
        // Attach the exercise to the user and mark it as done
        $user->exercises()->attach($exerciseId, ['is_done' => true]);

        // Update the user's remaining calories after doing the exercise
        $caloriesBurned = $exercise->calories_burned;
        $remainingCalories = max(0, $user->calories - $caloriesBurned); // Ensure remaining calories don't go negative
        $user->calories = $remainingCalories;
    }

    // Save the updated user
    $user->save();

    return back();
}
 public function updateExerciseStatusfavorite(Request $request, $exerciseId)
    {
        $user = auth()->user();
        $exercise = Exercise::findOrFail($exerciseId);

        $exists = $user->exercises()->wherePivot('exercise_id', $exerciseId)->exists();

        if ($exists) {
            // Update the pivot table if it exists
            $user->exercises()->updateExistingPivot($exerciseId, [
                'is_favorite' => true, // Mark as favorite
            ]);
        } else {
            // Attach the relationship with the correct status
            $user->exercises()->attach($exerciseId, [
                'is_favorite' => true, // Set to "favorite" initially
            ]);
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Exercise $exercise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exercise $exercise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exercise $exercise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercise $exercise)
    {
        //
    }
}
