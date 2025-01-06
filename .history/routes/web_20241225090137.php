<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::middleware("auth")->group(function(): void
{

});

Route::get('user/register', action: [UserController::class,"create"])->name("users.craete");
Route::POST('user/create', action: [AuthController::class,"register"])->name("auth.register");
