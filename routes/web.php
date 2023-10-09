<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::get("/", [TodoController::class, "index"])->name("index");
Route::post("/", [TodoController::class, "store"])->name("store");
Route::get("/{id}", [TodoController::class, "edit"])->name("edit");
Route::put("/{id}", [TodoController::class, "update"])->name("update");
Route::delete("/{id}", [TodoController::class, "destroy"])->name("delete");
Route::post("/search", [TodoController::class, "search"])->name("search");
Route::post("/sort", [TodoController::class, "sort"])->name("sort");
