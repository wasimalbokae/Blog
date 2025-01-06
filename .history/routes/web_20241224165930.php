<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::middleware("auth")->group(function(): void
{

});
Route::get();
Route::get('register', action: [AuthController::class,"register"])->name("register");

Route::POST('users/create', action: [UserController::class,"create"])->name("users.create");
