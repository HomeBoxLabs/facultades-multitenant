<?php

use App\Http\Controllers\TenantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas públicas del Tenant (sin autenticación)
Route::prefix('tenant')->group(function () {
    Route::get('/', [TenantController::class, 'getCurrent']); // GET /api/tenant
    Route::get('/all', [TenantController::class, 'index']); // GET /api/tenant/all
    Route::get('/{id}', [TenantController::class, 'show']); // GET /api/tenant/{id}
});
