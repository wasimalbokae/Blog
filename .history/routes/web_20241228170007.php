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
    Route::get('users/create', [UserController::class,"create"])->name("users.craete");
    Route::POST('user/create',[AuthController::class,"register"])->name("auth.register");

    Route::POST('user',[UserController::class,"index"])->name("users");


    Route::POST('logout',[AuthController::class,"logout"])->name("logout");
});
Route::get('register', [UserController::class,"create"])->name("users.create");
Route::POST('user/create',[AuthController::class,"register"])->name("auth.register");

Route::get('/', [AuthController::class ,"formLogin"] )->name("login");
Route::post('/', [AuthController::class,"login"]);
