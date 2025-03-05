<?php

use App\Http\Controllers\CoursProfesseurController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'doLogin']);

Route::resource('users', \App\Http\Controllers\ListUsersController::class);

Route::resource('register', \App\Http\Controllers\RegisterController::class);

Route::resource('salle', \App\Http\Controllers\SallesController::class);

Route::resource('cours', \App\Http\Controllers\CoursController::class);

Route::resource('cours-professeurs', \App\Http\Controllers\CoursProfesseurController::class);
Route::delete('cours-professeurs/{cours_id}/{prof_id}', [CoursProfesseurController::class, 'destroy'])->name('cours-professeurs.destroy');

Route::resource('emargements', \App\Http\Controllers\EmargementController::class);
Route::get('AllHistoriqueEmargements', [\App\Http\Controllers\EmargementController::class, 'index_2'])->name('AllHistoriqueEmargements');

