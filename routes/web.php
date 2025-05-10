<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\LeadsController::class, 'showFilterForm']);

Route::get('/leads/filter', [App\Http\Controllers\LeadsController::class, 'showFilterForm'])->name('leads.filter');
Route::post('/leads/template/save', [App\Http\Controllers\LeadsController::class, 'saveTemplate'])->name('leads.template.save');
Route::delete('/leads/template/delete/{id}', [App\Http\Controllers\LeadsController::class, 'deleteTemplate'])->name('leads.template.delete');
Route::delete('/leads/template/delete-all', [App\Http\Controllers\LeadsController::class, 'deleteAllTemplates'])->name('leads.template.deleteAll');
Route::get('/leads/report/download', [App\Http\Controllers\LeadsController::class, 'downloadReport'])->name('leads.report.download');
