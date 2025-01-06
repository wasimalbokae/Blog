<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

Route::middleware("auth")->group(function(): void
{
    Route::get('index',  function(){return view("index");})->name("index");

    Route::get('/posts', [PostController::class, "index"])->name("posts");
    Route::get('/posts/create', [PostController::class, "create"] )->name("posts.create");
    Route::POST('/posts/store', [PostController::class, "store"] )->name("posts.store");
    Route::get('/posts/show/id={id?}', [PostController::class, "show"] )->name("posts.show");
    Route::get('/posts/edit/id={id?}', [PostController::class, "edit"] )->name("posts.edit");
    Route::POST('/posts/update/id={id?}', [PostController::class, "update"] )->name("posts.update");
    Route::get('/posts/delete/id={id?}', [PostController::class, "destroy"] )->name("posts.delete");
    Route::get('register', [UserController::class,"create"])->name("register");
    Route::POST('user/create',[AuthController::class,"register"])->name("auth.register");
    Route::get('/users/show/id={id?}', [UserController::class, "show"] )->name("users.show");
    Route::get('/users/edit/id={id?}', [UserController::class, "edit"] )->name("users.edit");
    Route::POST('/users/update/id={id?}', [UserController::class, "update"] )->name("users.update");
    Route::get('/users/delete/id={id?}', [UserController::class, "destroy"] )->name("users.delete");


    Route::get('users',[UserController::class,"index"])->name("users.index");

    Route::POST('logout',[AuthController::class,"logout"])->name("logout");
});




Route::get('register', [UserController::class,"create"])->name("register");
Route::POST('user/create',[AuthController::class,"register"])->name("auth.register");

Route::get('/', [AuthController::class ,"formLogin"] )->name("login");
Route::get('/login', [AuthController::class ,"formlogin"] )->name("login");

Route::post('/', [AuthController::class,"login"]);
