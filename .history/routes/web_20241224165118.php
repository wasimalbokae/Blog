<?php
use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group(function(): void
{

});
Route::get('/', function () {
    return view('login');
});
