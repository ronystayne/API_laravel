<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtigosController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// List artigos
Route::get('artigos', [ArtigosController::class, 'index']);

// List single artigo
Route::get('artigos/{id}', [ArtigosController::class, 'show']);

// Create new artigo
Route::post('artigos', [ArtigosController::class, 'store']);

// Update artigo
Route::put('artigos/{id}', [ArtigosController::class, 'update']);

// Delete artigo
Route::delete('artigos/{id}', [ArtigosController::class,'destroy']);