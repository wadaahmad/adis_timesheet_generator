<?php

use App\Http\Controllers\Report;
use Illuminate\Support\Facades\Route;

Route::controller(Report::class)->group(function () {
    Route::get('/', 'form');
    Route::post('/generate', 'generateView');
    Route::get('/generate-excel', 'generateExcel');
});