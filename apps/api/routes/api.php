<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RelationshipController;

Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'application' => 'Aurora',
        'version' => '0.1.0',
    ]);
});

Route::apiResource('relationships', RelationshipController::class);

// Route::get('/relationships/{relationship}', [
//     RelationshipController::class,
//      'show'
// ]);

// Route::get('/relationships', [
//     RelationshipController::class,
//     'index'
// ]);

// Route::post('/relationships', [
//     RelationshipController::class, 
//     'store'
// ]);

// Route::patch('/relationships/{relationship}', [
//     RelationshipController::class,
//     'update'
// ]);

// Route::delete('/relationships/{relationship}', [
//     RelationshipController::class,
//     'destroy'
// ]);