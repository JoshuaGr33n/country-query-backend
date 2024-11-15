<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::middleware('api')->group(function () {
    Route::post('/country', [CountryController::class, 'getCountryByCode'])
        ->name('country.show');
});

