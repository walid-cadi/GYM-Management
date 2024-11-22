<?php

namespace App\Http\Controllers;

use App\Models\Sesion;
use App\Models\TrainerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SesionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sessions = Sesion::all();
        //dd($sessions);
        $request_isPay = TrainerRequest::where("user_id",auth()->user()->id)->first();
        return view("session.session",compact("sessions","request_isPay"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $sessions = Sesion::all();

        $sessions = $sessions->map(function ($e) {
            return [
                "id" => $e->id,
                "start" => $e->start,
                "end" => $e->end,
                "owner"=> $e->user_id,
                "color" => "#ff6d2f",
                "passed" => false,
                "title" => $e->name
            ];
        });

        return response()->json([
            "sessions" => $sessions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "start" => "required",
            "end" => "required"
        ]);

        Sesion::create([
            "name" => $request->name,
            "description" => $request->description,
            "spots" => $request->spots,
            "start" => $request->start . ":00",
            "end" => $request->end . ":00",
            "user_id" => Auth::user()->id
        ]);

        return back();
    }
    //  public function joinSession($sessionId){
    //         // Check if the user is authenticated
    //         //dd($sessionId);
    //         if (!Auth::check()) {
    //             return redirect()->route('login')->with('error', 'Please log in to join a session.');
    //         }

    //         $session = Sesion::findOrFail($sessionId);

    //         // Check if spots are available
    //         if ($session->spots <= 0) {
    //             return back()->with('error', 'Ce cours est plein.');
    //         }

    //         // Check if the user is already enrolled in the session
    //         if (DB::table('user_sesions')->where('sesion_id', $sessionId)->where('user_id', Auth::id())->exists()) {
    //             return back()->with('error', 'Vous êtes déjà inscrit à ce cours.');
    //         }

    //         // Attach the user to the session
    //         if ($session && auth()->user()) {
    //             $session->users()->attach(auth()->user());
    //         }
    //         // Decrement the available spots
    //         $session->decrement('spots');

    //         // Redirect with success message
    //         return back()->with('success', 'Vous êtes inscrit avec succès.');
    //     }
    public function joinSession($sessionId)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Veuillez vous connecter pour rejoindre une session.');
    }

    $user = Auth::user();
    $session = Sesion::findOrFail($sessionId);

    if ($session->spots <= 0) {
        return back()->with('error', 'Ce cours est plein.');
    }

    if ($user->sessions()->where('sesion_id', $sessionId)->exists()) {
        return back()->with('error', 'Vous êtes déjà inscrit à ce cours.');
    }

    $user->sessions()->attach($sessionId);

    $session->decrement('spots');

    return back()->with('success', 'Vous êtes inscrit avec succès.');
}


    /**
     * Display the specified resource.
     */
    public function show(Sesion $sesion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sesion $sesion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sesion $sesion)
    {
        //
        $request->validate([
            "start" => "required",
            "end" => "required"
        ]);

        $sesion->update([
            "start" => $request->start ,
            "end" => $request->end
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sesion $sesion)
    {
        //
        $sesion->delete();
        return back();
    }
}
