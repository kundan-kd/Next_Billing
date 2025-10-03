<?php

use App\Http\Controllers\API\Authentication\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Nuwave\Lighthouse\GraphQL;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
});
