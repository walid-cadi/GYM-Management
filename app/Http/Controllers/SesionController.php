<?php

namespace App\Http\Controllers;

use App\Models\Sesion;
use App\Models\TrainerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sessions = Sesion::all();
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
                "color" => "#006400",
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
