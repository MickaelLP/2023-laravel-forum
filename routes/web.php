<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group([
], function(){
    Route::resource('/subject', SubjectController::class);
    Route::resource('/answer', AnswerController::class);
});

// Route::get('/subject', [SubjectController::class, 'index'])->name("subject.index");
// Route::get('/subject/create', [SubjectController::class, 'create'])->name("subject.create");
// Route::post('/subject/store', [SubjectController::class, 'store'])->name("subject.store");
// Route::get('/subject/show/{subject}', [SubjectController::class, 'show'])->name("subject.show");

require __DIR__.'/auth.php';
