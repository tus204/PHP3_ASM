<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;

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

// Route::get('books',[ProductController::class,'indexAPI'])->name('book.indexAPI');
// Route::get('books/{book}',[ProductController::class,'showAPI'])->name('book.showAPI');

Route::get('/ajex-search-book',[ApiController::class,'ajaxSearch'])->name('ajax-search-book');
