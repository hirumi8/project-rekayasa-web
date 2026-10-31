<?php

use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.home');
})->name('home');

Route::get('/about', function () {
    return view('page.about');
})->name('about');

Route::get('/profile', [MahasiswaController::class, 'index'])->name('profile');
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show');
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('projects.index');
    })->name('admin.dashboard');
    Route::resource('projects', AdminProjectController::class);
    Route::get('/logout', function () {
        return redirect()->route('home');
    })->name('logout');
});
