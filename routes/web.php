<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'doLogin']);

Route::get('/listUsers', [\App\Http\Controllers\ListUsersController::class, 'index'])->name('listUsers');
Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'create'])->name('register');
Route::post('/saveUser', [\App\Http\Controllers\RegisterController::class, 'store'])->name('saveUser');
Route::delete('/deleteUser/{id}', [\App\Http\Controllers\RegisterController::class, 'destroy'])->name('deleteUser');
Route::get ('/editUser/{id}', [\App\Http\Controllers\RegisterController::class, 'edit'])->name('editUser');
Route::put('/updateUser/{id}', [\App\Http\Controllers\RegisterController::class, 'update'])->name('updateUser');

Route::get('/listSalles', [\App\Http\Controllers\SallesController::class, 'index'])->name('listSalles');
Route::get('/addSalle', [\App\Http\Controllers\SallesController::class, 'create'])->name('addSalle');
Route::post('/saveSalle', [\App\Http\Controllers\SallesController::class, 'store'])->name('saveSalle');
Route::delete('/deleteSalle/{id}', [\App\Http\Controllers\SallesController::class, 'destroy'])->name('deleteSalle');
Route::get ('/editSalle/{id}', [\App\Http\Controllers\SallesController::class, 'edit'])->name('editSalle');
Route::put('/updateSalle/{id}', [\App\Http\Controllers\SallesController::class, 'update'])->name('updateSalle');

Route::get('/listCours', [\App\Http\Controllers\CoursController::class, 'index'])->name('listCours');
Route::get('/addCours', [\App\Http\Controllers\CoursController::class, 'create'])->name('addCours');
Route::post('/saveCours', [\App\Http\Controllers\CoursController::class, 'store'])->name('saveCours');
Route::delete('/deleteCours/{id}', [\App\Http\Controllers\CoursController::class, 'destroy'])->name('deleteCours');
Route::get ('/editCours/{id}', [\App\Http\Controllers\CoursController::class, 'edit'])->name('editCours');
Route::put('/updateCours/{id}', [\App\Http\Controllers\CoursController::class, 'update'])->name('updateCours');
