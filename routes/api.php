<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('category')->controller(CategoryController::class)->name('category.')->group(function () {
  Route::get('', 'index')->name('index');
  Route::post('store', 'store')->name('store');
  Route::put('update/{id}', 'update')->name('update');
  Route::delete('delete/{id}','delete')->name('delete');
});
Route::post("login", [UserController::class, 'login']);
