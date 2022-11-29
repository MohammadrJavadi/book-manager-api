<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(["prefix" => "v1", "as" => "api."],function (){
    //#region auth
    Route::post("/login", [AuthController::class, "login"])->name("login");
    Route::post("/register", [AuthController::class, "register"])->name("register");
    //#endregion
    //#region books
    Route::apiResource("books", BookController::class, ["only" => ["index", "show"]]);
    //#endregion
    Route::group(["middleware" => "auth:sanctum"], function (){
        //#region auth
        Route::post("/logout", [AuthController::class, "logout"])->name("logout");
        //#endregion
        //#region books
        Route::apiResource("books", BookController::class, ["except" => ["index", "show"]]);
        //#endregion
        //#region categories
        Route::apiResource("categories", \App\Http\Controllers\Api\CategoryController::class);
        //#endregion
        //#region authors
        Route::apiResource("authors", \App\Http\Controllers\Api\AuthorController::class);
        //#endregion
    });
});
