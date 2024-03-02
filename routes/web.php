<?php

use Illuminate\Support\Facades\Route;

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

Route::get("admin/", [\App\Http\Controllers\AuthController::class, "signIn"])->name("admin.sign_in");
Route::post("admin/process-sign-in", [\App\Http\Controllers\AuthController::class, "processSign"])->name("admin.process_sign_in");

Route::get("/", [\App\Http\Controllers\AuthController::class, "userSignIn"])->name("user.sign_in");
Route::post("/process-sign-in", [\App\Http\Controllers\AuthController::class, "userProcessSignIn"])->name("user.process_sign_in");


Route::prefix("")
    ->name("user.")
    ->middleware("user")
    ->group(function (){
        Route::get("/dashboard", [\App\Http\Controllers\UserController::class, "dashboard"])->name("dashboard");
////        Route::get("/users", [\App\Http\Controllers\AdminController::class, "users"])->name("users");
        Route::get("/documents", [\App\Http\Controllers\UserController::class, "documents"])->name("documents");
        Route::post("/logout", [\App\Http\Controllers\AuthController::class, "userLogout"])->name("logout");
        Route::get("/items", [\App\Http\Controllers\UserController::class, "items"])->name("items");

        Route::get("/transfers", [\App\Http\Controllers\UserController::class, "transfers"])->name("transfers");

        Route::post("/products",function (){
            return "ok";
        } )->name("products");
    });



Route::prefix("admin")
    ->name("admin.")
    ->middleware("admin")
    ->group(function (){
        Route::get("/dashboard", [\App\Http\Controllers\AdminController::class, "dashboard"])->name("dashboard");
        Route::get("/users", [\App\Http\Controllers\AdminController::class, "users"])->name("users");
        Route::get("/depots", [\App\Http\Controllers\AdminController::class, "depots"])->name("depots");
        Route::get("/documents", [\App\Http\Controllers\AdminController::class, "documents"])->name("documents");
        Route::get("/items", [\App\Http\Controllers\AdminController::class, "items"])->name("items");
        Route::get("/transfers", [\App\Http\Controllers\AdminController::class, "transfers"])->name("transfers");
        Route::post("/logout", [\App\Http\Controllers\AuthController::class, "logout"])->name("logout");
    });
