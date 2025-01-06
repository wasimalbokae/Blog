<?php
use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group(function(): void
{

});
Route::get()
Route::get('/', [UserController::class,"create"])->name("create");
