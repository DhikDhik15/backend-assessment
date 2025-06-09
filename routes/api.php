<?php

use Illuminate\Http\Request;
use App\Http\Middleware\RateLimiter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware([
    RateLimiter::class
])->group(function () {
    Route::post('/upload', [FileController::class, 'upload']);
    Route::get('/files/{filename}', [FileController::class, 'get']);
});

Route::middleware([RateLimiter::class])->get('/ping', function () {
    return response()->json(['message' => 'OK']);
});
