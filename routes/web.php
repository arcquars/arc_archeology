<?php
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProjectController;
use \App\Http\Controllers\UeController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    /** Seccion proyectos */
    Route::get('projects/{projectId}/steps/{step?}', [ProjectController::class, 'showSteps'])->name('projects.steps.show');
    Route::post('projects/{projectId}/comment/create/{step?}', [ProjectController::class, 'createComment'])->name('projects.comment.create');
    Route::post('projects/{projectId}/save-preliminary-report', [ProjectController::class, 'savePreliminaryReport'])->name('projects.save_preliminary_report');
    Route::post('projects/{projectId}/save-final-report', [ProjectController::class, 'saveFinalReport'])->name('projects.save_final_report');
    Route::resource('projects', ProjectController::class);

    /** Seccion Ues */
    Route::get('ues/{projectId}', [UeController::class, 'index'])->name('ues.index');
    Route::get('ues/{projectId}/create', [UeController::class, 'create'])->name('ues.create');
    Route::get('ues/{ueId}/show', [UeController::class, 'show'])->name('ues.show');

    // Otras rutas protegidas relacionadas con proyectos podrían ir aquí
    // Route::get('/projects/reports', [ProjectController::class, 'reports'])->name('projects.reports');
});
