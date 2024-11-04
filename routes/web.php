<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TaskController as AdminTaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware("auth")->prefix("/admin")->name("admin.")->group(function () {
    Route::get("/posts", [AdminTaskController::class, "index"])->name("posts.index");
    Route::get("/posts/{id}", [AdminTaskController::class, "show"])->name("posts.show");
    Route::get("/posts/create", [AdminTaskController::class, "create"])->name("posts.create");
    Route::post("/posts", [AdminTaskController::class, "store"])->name("posts.store");
});
