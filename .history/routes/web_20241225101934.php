<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::middleware("auth")->group(function(): void
{

});

Route::get('user/register', [UserController::class,"create"])->name("users.craete");
Route::POST('user/create',[AuthController::class,"register"])->name("auth.register");
Route::get('posts',  "<h1>Hello index posts</h1>")->name("posts");
