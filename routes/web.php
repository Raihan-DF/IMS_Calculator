<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KreditController;

Route::get('/', [KreditController::class, 'index'])->name('kredit.index');
Route::post('/calculate', [KreditController::class, 'calculate'])->name('kredit.calculate');
