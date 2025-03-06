<?php

use App\Http\Controllers\CoursProfesseurController;
use App\Http\Controllers\ExportEmargementsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'doLogin']);
Route::delete('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Route::resource('users', \App\Http\Controllers\ListUsersController::class)->middleware('auth');

Route::resource('register', \App\Http\Controllers\RegisterController::class)->middleware('auth');

Route::resource('salle', \App\Http\Controllers\SallesController::class)->middleware('auth');

Route::resource('cours', \App\Http\Controllers\CoursController::class)->middleware('auth');

Route::resource('cours-professeurs', \App\Http\Controllers\CoursProfesseurController::class)->middleware('auth');
Route::delete('cours-professeurs/{cours_id}/{prof_id}', [CoursProfesseurController::class, 'destroy'])->name('cours-professeurs.destroy')->middleware('auth');

Route::resource('emargements', \App\Http\Controllers\EmargementController::class)->middleware('auth');
Route::get('AllHistoriqueEmargements', [\App\Http\Controllers\EmargementController::class, 'index_2'])->name('AllHistoriqueEmargements')->middleware('auth');


Route::get('/export', [ExportEmargementsController::class, 'index'])->name('ExportEmargements.index');
Route::post('/export', [ExportEmargementsController::class, 'export'])->name('ExportEmargements.export');

Route::post('/export/pdf', [ExportEmargementsController::class, 'exportPDF'])->name('ExportEmargements.pdf');





