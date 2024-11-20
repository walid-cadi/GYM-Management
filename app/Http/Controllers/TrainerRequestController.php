<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\TrainerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Price;
use Stripe\Stripe;

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

        return redirect(route("trainer.subscrip"));
    }
    public function subscrip(){
        Stripe::setApiKey(config('stripe.sk'));
        $prices = Price::all();

          $checkout_session = Session::create([
            'line_items' => [[
              'price' => $prices->data[0]->id,
              'quantity' => 1,
            ]],
            'mode' => 'subscription',
            'success_url' => route('trainer.seccess'),
            'cancel_url' => route('session.index'),
          ]);

          return redirect()->away($checkout_session->url);
    }

    public function success(){
        $user = Auth::user();
        $trainerRequest = TrainerRequest::where('user_id', $user->id)->first();

        if ($trainerRequest) {
            $trainerRequest->update([
                'pay' => true
            ]);
        }
        return redirect(route("session.index"));
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
