<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\extranetController;
use App\Http\Controllers\intranetController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {return view('welcome');});
//Route::get('/', function () {return view('extranet.index');});

Route::controller(extranetController::class)->group(function () {
    Route::get('/', 'index')->name('extranet.index');
});


Route::controller(ClienteController::class)->prefix('cliente')->group(function () {
    Route::post('guardar', 'store')->name('cliente.store');
});
Route::controller(DepartamentoController::class)->prefix('departamento')->group(function () {
    Route::get('getMunicipios', 'getMunicipios')->name('departamento.getMunicipios');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::controller(intranetController::class)->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
    });
    //Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
});
