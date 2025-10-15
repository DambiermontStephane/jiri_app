<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\JiriController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::resources([
        'jiris' => JiriController::class,
        'contacts' => ContactController::class,
        'projects' => ProjectController::class
    ]);
});



// Jiris route
/*Route::get('/jiris', [JiriController::class, 'index'])->name('jiris.index');
Route::get('/jiris/create', [JiriController::class, 'create'])->name('jiris.create');
Route::get('/jiris/{jiri}', [JiriController::class, 'show'])->name('jiris.show');
Route::post('/jiris', [JiriController::class, 'store'])->name('jiris.store');

// Contacts route
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contact.show');

// Projects route
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/{projet}', [ProjectController::class, 'show'])->name('project.show');*/
