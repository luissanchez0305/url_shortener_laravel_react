<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/shorten', [UrlController::class, 'shorten'])->name('shorten');
Route::get('/{shortened}', [UrlController::class, 'redirect'])->name('redirect');
