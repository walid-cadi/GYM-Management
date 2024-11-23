<?php

namespace App\Http\Controllers;

use App\Models\Sesion;
use App\Models\TrainerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Checkout\Session;
use Stripe\Price;
use Stripe\Stripe;

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
            "is_premium" => $request->has("is_premium") ? 1 : 0,
            "user_id" => Auth::user()->id
        ]);

        return back();
    }

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
     public function subscripsession(Request $request, $sessionId)
    {
        Stripe::setApiKey(config('stripe.sk'));
        $prices = Price::all();

        $checkout_session = Session::create([
            'line_items' => [[
                'price' => $prices->data[0]->id,
                'quantity' => 1,
            ]],
            'mode' => 'subscription',
            'success_url' => route('paymentSucces', ['sessionId' => $sessionId]),
            'cancel_url' => route('session.index'),
        ]);

        return redirect()->away($checkout_session->url);
    }
      public function paymentSucces($sessionId)
    {
        $user = Auth::user();
        $session = Sesion::findOrFail($sessionId);

        if ($user && $session) {
            // Attach only if the user is not already linked with 'pay' as true
            if (!$session->users()->where('user_id', $user->id)->wherePivot('is_pay', true)->exists()) {
                $session->users()->attach($user->id, ['is_pay' => true]);
                $session->decrement('spots');
            }

            return redirect()->route('session.index')->with('success', 'Payment successful! You can now join the session.');
        }

        return redirect()->route('session.index')->with('error', 'Payment failed or invalid session.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Sesion $session)
    {
        //
        return view("session.show",compact("session"));
    }

    public function available(Sesion $session){
        if ($session->available == false) {
            $session->update([
                "available" => true
            ]);
        } else {
            $session->update([
                "available" => false
            ]);
        }
        return back();
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
        return redirect(route("session.index"));
    }
}
