<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, "index"])->name('dashboard');
    //#region books
    Route::resource('books', \App\Http\Controllers\Admin\BookController::class);
    //#endregion
    //#region authors
    Route::resource("authors", \App\Http\Controllers\Admin\AuthorController::class)->only("index", "destroy");
    //#endregion
    //#region categories
    Route::resource("categories", \App\Http\Controllers\Admin\CategoryController::class)->only("index", "destroy");
    //#endregion
});
