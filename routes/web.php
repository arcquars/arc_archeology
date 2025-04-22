<?php
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('projects', ProjectController::class);

    // Otras rutas protegidas relacionadas con proyectos podrían ir aquí
    // Route::get('/projects/reports', [ProjectController::class, 'reports'])->name('projects.reports');
});
