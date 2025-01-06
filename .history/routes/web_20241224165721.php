<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
Route::middleware("auth")->group(function(): void
{

});
Route::get();

Route::get('/', [UserController::class,"create"])->name("users.create");
