<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
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
    Route::get('/register', [UserController::class,"create"])->name("register");
    Route::POST('user/create',[AuthController::class,"register"])->name("auth.register");
    Route::get('/users/show/id={id?}', [UserController::class, "show"] )->name("users.show");
    Route::get('/users/edit/id={id?}', [UserController::class, "edit"] )->name("users.edit");
    Route::POST('/users/update/id={id?}', [UserController::class, "update"] )->name("users.update");
    Route::get('/users/delete/id={id?}', [UserController::class, "destroy"] )->name("users.delete");

    Route::get( '/tags', [TagController::class, "index"])->name("tags");
    Route::get( '/tags/create', [TagController::class, "create"] )->name("tags.create");
    Route::POST('/tags/store', [TagController::class, "store"] )->name("tags.store");
    Route::get( '/tags/show/id={id?}', [TagController::class, "show"] )->name("tags.show");
    Route::get( '/tags/edit/id={id?}', [TagController::class, "edit"] )->name("tags.edit");
    Route::POST('/tags/update/id={id?}', [TagController::class, "update"] )->name("tags.update");
    Route::get( '/tags/delete/id={id?}', [TagController::class, "destroy"] )->name("tags.delete");

    Route::get( '/Category',                 [CategoryController::class, "index"])->name("Category");
    Route::get( '/Category/create',          [CategoryController::class, "create"] )->name("Category.create");
    Route::POST('/Category/store',           [CategoryController::class, "store"] )->name("Category.store");
    Route::get( '/Category/show/id={id?}',   [CategoryController::class, "show"] )->name("Category.show");
    Route::get( '/Category/edit/id={id?}',   [CategoryController::class, "edit"] )->name("Category.edit");
    Route::POST('/Category/update/id={id?}', [CategoryController::class, "update"] )->name("Category.update");
    Route::get( '/Category/delete/id={id?}', [CategoryController::class, "destroy"] )->name("Category.delete");

    Route::POST('/comments/store/{id_post}', [CommentController::class, "store"] )->name("comments.store");
    Route::POST('/comments/delete/{id_post}/{id}', [CommentController::class, "destroy"] )->name("comments.destroy");
    Route::POST('/comments/edit/{id}', [CommentController::class, "edit"] )->name("comments.edit");


    Route::get('users',[UserController::class,"index"])->name("users.index");
    Route::POST('logout',[AuthController::class,"logout"])->name("logout");
});

Route::middleware('guest')->group(function ()
{

    Route::post('/', [AuthController::class,"login"])->name("login");
});
Route::get('/register', [UserController::class,"create"])->name("register");
Route::POST('user/create',[AuthController::class,"register"])->name("auth.register");
Route::get('/login', [AuthController::class,"formLogin"])->name("formLogin");
Route::get('/',  [PostController::class,"index"])->name("posts.index");



