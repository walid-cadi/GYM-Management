<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\TrainerRequestController;
use App\Models\TrainerRequest;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("home.home");
    //view('welcome');
});

Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth', 'verified',"role:admin"])->name('dashboard');



Route::get('/gym', function () {
    return view('gym.gym');
})->middleware(['auth', 'verified'])->name('gym');



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
    Route::get("/sessions/create",[SesionController::class,"create"])->name("session.create");
    Route::post("/sessions/store",[SesionController::class,"store"])->name("session.store");
    Route::put("/calendar/update/{sesion}" , [SesionController::class , "update"])->name("session.update");
    Route::delete("/calendar/delete/{sesion}" , [SesionController::class , "destroy"])->name("session.delete");

    Route::get("trainer/subscrip",[TrainerRequestController::class,"subscrip"])->name("trainer.subscrip");
    Route::get("trainer/seccess",[TrainerRequestController::class,"success"])->name("trainer.seccess");
    Route::post('/session/{id}/join', [SesionController::class, 'joinSession'])->name('sessions.join');
    Route::delete("/session/{sesion}",[SesionController::class,"destroy"])->name("session.delete");

    Route::post('/sessions/subscribe/{sessionId}', [SesionController::class, 'subscripsession'])->name('session.subscrip');
    Route::get('/sessions/payment-success/{sessionId}', [SesionController::class, 'paymentSucces'])->name('paymentSucces');
});

require __DIR__.'/auth.php';
