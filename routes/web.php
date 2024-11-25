<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\TrainerRequestController;
use App\Models\Reservation;
use App\Models\Sesion;
use App\Models\TrainerRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("home.home");
    //view('welcome');
});

Route::get('/admin', function () {
    $users = User::wherenot("id",1)->count();
    $trainers =  User::whereHas('roles', function ($query) {
            $query->where('name', 'trainer');
        })->count();
    $sessions = Sesion::count();
    $trainers_request = TrainerRequest::count();
    $reservation = Reservation::all();
    
    return view('dashboard',compact("users","trainers","sessions","trainers_request"));
})->middleware(['auth', 'verified',"role:admin"])->name('dashboard');



Route::get('/gym', function () {
    $sessions = Sesion::all();
    return view('gym.gym',compact("sessions"));
})->middleware(['auth', 'verified'])->name('gym');

Route::get("/user-profile",function(){
    $user = Auth::user();
    $dones = $user->exercises()->wherePivot("is_done", true)->get();
    $favorites = $user->exercises()->wherePivot("is_favorite", true)->get();
    return view("profile.index",compact("dones","favorites"));
});



Route::get('/users', function () {
    $users = User::whereNot("id",1)->get();
    return view('users.users',compact("users"));
})->middleware(['auth', 'verified',"role:admin"])->name('users');




Route::get('/trainer-request', function () {
    $trainerRequests = TrainerRequest::where('status', 'pending')->get();
    return view('TrainerRequest.TrainerRequest',compact("trainerRequests"));
})->middleware(['auth', 'verified'])->name('trainer-request');



Route::get('/info', function () {
    return view('info.info');
})->name('info');

Route::put("/info/update/{user}",[RegisteredUserController::class,"info"])->name("info.update");


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Route::post('/trainer-requests', [TrainerRequestController::class, 'index'])->name('trainer-requests');
    Route::post('/trainer-requests/store', [TrainerRequestController::class, 'store'])->name('trainer-requests.store');
    Route::post('trainer-requests/{trainerRequest}/approve', [TrainerRequestController::class, 'approve'])->name('trainer-requests.approve');
    Route::post('trainer-requests/{trainerRequest}/reject', [TrainerRequestController::class, 'reject'])->name('trainer-requests.reject');


    Route::get("/sessions",[SesionController::class,"index"])->name("session.index");
    Route::get("/session/create",[SesionController::class,"create"])->name("session.create");
    Route::post("/session/store",[SesionController::class,"store"])->name("session.store");
    Route::get("/session/show/{session}",[SesionController::class,"show"])->name("session.show");
    Route::put("/session/available/{session}",[SesionController::class,"available"])->name("session.available");
    Route::post('/session/{id}/join', [SesionController::class, 'joinSession'])->name('sessions.join');
    Route::delete("/session/{sesion}",[SesionController::class,"destroy"])->name("session.delete");
    Route::post('/session/subscribe/{sessionId}', [SesionController::class, 'subscripsession'])->name('session.subscrip');
    Route::get('/session/payment-success/{sessionId}', [SesionController::class, 'paymentSucces'])->name('paymentSucces');

    Route::post('/exercise/store',[ExerciseController::class,"store"])->name("exercise.store");
    Route::post('/exercises/{exercise}/status/done', [ExerciseController::class, 'updateExerciseStatusdone'])->name('exercises.updateStatusdone');
    Route::post('/exercises/{exercise}/status/favorite', [ExerciseController::class, 'updateExerciseStatusfavorite'])->name('exercises.updateStatusfavorite');


    // Route::put("/calendar/update/{sesion}" , [SesionController::class , "update"])->name("session.update");
    // Route::delete("/calendar/delete/{sesion}" , [SesionController::class , "destroy"])->name("session.delete");

    Route::get("trainer/subscrip",[TrainerRequestController::class,"subscrip"])->name("trainer.subscrip");
    Route::get("trainer/seccess",[TrainerRequestController::class,"success"])->name("trainer.seccess");


    Route::get("/reservation",[ReservationController::class,"index"]);
    Route::get("/reservation/create",[ReservationController::class,"create"])->name("reservation.create");
    Route::post("/reservation/store",[ReservationController::class,"store"])->name("reservation.store");
    Route::put("/reservation/update/{reservation}",[ReservationController::class,"update"])->name("reservation.update");
    Route::delete("/reservation/delete/{reservation}",[ReservationController::class,"destroy"])->name("reservation.delete");
});

require __DIR__.'/auth.php';
