<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RsvpResponseController;

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

Route::post('/rsvp', [RsvpResponseController::class, 'store']);
Route::get('/rsvp', [RsvpResponseController::class, 'all']);
Route::get('/rsvp/message/{id}', [RsvpResponseController::class, 'getMessage']);
Route::delete('/rsvp/{id}', [RsvpResponseController::class, 'delete']);

