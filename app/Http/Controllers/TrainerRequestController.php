<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\TrainerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainerRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //dd($trainerRequests);
        //return view('TrainerRequest.TrainerRequest', compact('trainerRequests'));
    }
     public function approve(TrainerRequest $trainerRequest)
    {
        $trainerRequest->update(['status' => 'approved']);
        $trainerRole = Role::where("name","trainer")->first();
        $trainerRequest->user->roles()->attach($trainerRole);

        return back();
    }

    public function reject(TrainerRequest $trainerRequest)
    {
        $trainerRequest->update(['status' => 'rejected']);
        return back();
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
        TrainerRequest::create([
            'user_id' => auth()->user()->id,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(TrainerRequest $trainerRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainerRequest $trainerRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrainerRequest $trainerRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainerRequest $trainerRequest)
    {
        //
    }
}
