<?php

/*DB::listen(function($query) {
	var_dump($query->sql);
});*/

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProjectController;

Route::view('/','home')->name('home');
Route::view('/about','about')->name('about');

/*Route::resource('portfolio', ProjectController::class)
		->names('projects')
		->parameters(['portfolio' => 'project']);*/

Route::get('/portfolio', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/portfolio/create', [ProjectController::class, 'create'])->name('projects.create');
Route::get('/portfolio/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::patch('/portfolio/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::post('/portfolio', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/portfolio/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::delete('/portfolio/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

Route::get('/categorias', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categorias/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categorias/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::patch('/categorias/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::post('/categorias', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categorias/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::delete('/categorias/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::view('/contact','contact')->name('contact');
Route::post('/contact', [MessageController::class, 'store'])->name('contact.store');

Auth::routes();