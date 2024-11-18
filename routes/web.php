<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainerRequestController;
use App\Models\TrainerRequest;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("home.home");
    //view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
});

require __DIR__.'/auth.php';
