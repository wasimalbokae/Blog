<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
Route::middleware("auth")->group(function(): void
{
    Route::get('posts',  function(){return "<h1>Hello index posts</h1>";})->name("posts");
    Route::get('welcome',  function(){return view("welcome");})->name("welcome");
    Route::POST('logout',[AuthController::class,"logout"])->name("logout");
});
Route::get('register', [UserController::class,"create"])->name("users.craete");
Route::POST('user/create',[AuthController::class,"register"])->name("auth.register");

Route::get('/', [AuthController::class ,"formLogin"] )->name("login");
Route::post('/', [AuthController::class,"login"]);
