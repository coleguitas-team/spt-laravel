<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\SecretaryController;
use App\Http\Controllers\BachillerController;
use App\Http\Controllers\AssessorController;
use Illuminate\Auth\Events\Login;

Route::get('/', [LoginController::class, 'index'])
    ->middleware('guest')
    ->name('login.index');

Route::post('/', [LoginController::class, 'main'])
    ->middleware('guest')
    ->name('login.main');

Route::get('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');

# STUDENT

Route::get('/st-inscripcion', [StudentController::class, 'viewInscription'])
    ->middleware('auth')
    ->name('st.inscripcion');

Route::get('/st-practica', [StudentController::class, 'viewPractice'])
    ->middleware('auth')
    ->name('st.practica');

Route::post('/newInscription', [StudentController::class, 'addInscription'])
    ->name('st.newInscription')
    ->middleware('auth');

Route::post('/{id}/editPractice', [StudentController::class, 'editPractice'])
    ->name('st.editPractice')
    ->middleware('auth');

# PROFESSOR

Route::get('/pr-inscripciones', [ProfessorController::class, 'viewInscriptions'])
    ->middleware('auth.professor')
    ->name('pr.inscripciones');

Route::get('/pr-practicas', [ProfessorController::class, 'viewPractices'])
    ->middleware('auth.professor')
    ->name('pr.practicas');

Route::put('/{id}/checkInscription',[ProfessorController::class,'checkInscription'])
    ->middleware('auth.professor')
    ->name('pr.checkInscription');

Route::post('/{id}/checkPractice', [ProfessorController::class, 'checkPractice'])
    ->middleware('auth.professor')    
    ->name('pr.checkPractice');

# SECRETARY

Route::get('/sc-practicas', [SecretaryController::class, 'viewPractices'])
    ->middleware('auth.secretary')
    ->name('sc.practicas');

Route::get('/sc-tesis', [SecretaryController::class, 'viewThesis'])
    ->middleware('auth.secretary')
    ->name('sc.tesis');

Route::post('/{id}/resPractice', [SecretaryController::class, 'resPractice'])
    ->name('sc.resPractice')
    ->middleware('auth.secretary');

Route::post('/addPost', [SecretaryController::class, 'addPost'])
    ->name('sc.addPost')
    ->middleware('auth.secretary');

Route::post('/{id}/dropPost', [SecretaryController::class, 'dropPost'])
    ->name('sc.dropPost')
    ->middleware('auth.secretary');

# BACHELOR

Route::get('/bc-proyecto', [BachillerController::class, 'viewProject'])
    ->middleware('auth.bachiller')
    ->name('bc.proyecto');

Route::get('/bc-tesis', [BachillerController::class, 'viewThesis'])
    ->middleware('auth.bachiller')
    ->name('bc.tesis');

Route::post('/addProject', [BachillerController::class, 'addProject'])
    ->name('bc.addProject')
    ->middleware('auth.bachiller');

Route::post('/{id}/editThesis', [BachillerController::class, 'editThesis'])
    ->name('bc.editThesis')
    ->middleware('auth.bachiller');

# ASSESSOR

Route::get('/ss-proyectos', [AssessorController::class, 'viewProjects'])
    ->middleware('auth.assessor')
    ->name('ss.proyectos');

Route::get('/ss-tesis', [AssessorController::class, 'viewThesis'])
    ->middleware('auth.assessor')
    ->name('ss.tesis');

Route::put('/{id}/checkProject',[AssessorController::class,'checkProject'])
    ->middleware('auth.assessor')
    ->name('ss.checkProject');

Route::post('/{id}/checkThesis', [AssessorController::class, 'checkThesis'])
    ->middleware('auth.assessor')    
    ->name('ss.checkThesis');

# EVERYJUAN

Route::get('/user', function () {
    return view('user');
})->middleware('auth');

