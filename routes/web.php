<?php
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProjectController;
use \App\Http\Controllers\UeController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\UserProfileController;
use App\Livewire\ChangePassword; // Importa tu componente Livewire

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    /** Seccion proyectos */
    Route::get('projects/show-structure-tab-log/{structureTabId}', [ProjectController::class, 'showStructureTabLog'])->name('projects.show.structure.tab.log');
    Route::get('projects/show-mural-stratigraphy-card-log/{muralStratigraphyCardId}', [ProjectController::class, 'showMuralStratigraphyCardLog'])->name('projects.show.mural.stratigraphy.card.log');
    Route::get('projects/show-stratum-card-log/{stratumCardId}', [ProjectController::class, 'showStratumCardLog'])->name('projects.show.stratum.card.log');
    Route::get('projects/show-human-remain-log/{humanRemainId}', [ProjectController::class, 'showHumanRemainsLog'])->name('projects.show.human.remain.log');
    Route::get('projects/show-log/{project_id}', [ProjectController::class, 'showLog'])->name('projects.show.log');
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

    Route::get('/change-password', function () {
        return view('auth.change-password-page'); // Apunta a la vista que incluye el componente
    })->name('password.change');

    Route::get('users/profile', [UserProfileController::class, 'show'])->name('users.profile.user');
});

Route::group(['middleware' => ['role:system-owner|admin']], function () { // Solo usuarios con rol 'admin'
    Route::resource('users', UserController::class);
});
