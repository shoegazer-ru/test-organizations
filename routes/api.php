<?php

use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\OperationController;
use Illuminate\Support\Facades\Route;

Route::get('/organizations', [OrganizationController::class, 'getList']);
Route::get('/organizations/statistic', [OrganizationController::class, 'getStatistic']);
Route::get('/operations', [OperationController::class, 'getList']);
