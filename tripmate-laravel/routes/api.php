<?php

use App\Http\Controllers\Api\DestinationApiController;
use Illuminate\Support\Facades\Route;

// RESTful API untuk data destinasi TripMate.
Route::apiResource('destinations', DestinationApiController::class);
