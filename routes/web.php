<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardkinerjaController;
use App\Http\Controllers\EntrikinerjaController;

Route::controller(DashboardkinerjaController::class)->group(function () {
    // Route::get('/', 'bupesta');
    Route::get('/', 'index');
    Route::get('/dashboard-kinerja', 'index');
    Route::get('/crud-dashboard-kinerja', 'crud');
    Route::post('/update-nilai/{id}', 'updatenilai');
    Route::get('/input-dashboard-kinerja', 'input');
    Route::get('/entri-kinerja', 'entri');
    Route::post('/update-data/{id}', 'update');
    Route::post('/update-kinerja', 'updatekinerja');
    Route::post('/analisis-triwulanan', 'inputanalisistriwulanan');
});

Route::controller(EntrikinerjaController::class)->group(function () {
    Route::post('/update-kinerja', 'updatekinerja');
    Route::post('/analisis-triwulanan', 'inputanalisistriwulanan');
});
