<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuranController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\Admin;
use App\Models\Student;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        // 'laravelVersion' => Application::VERSION,
        // 'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/pengumuman', [DashboardController::class, 'pengumuman'])->name('pengumuman');
    Route::get('/jadwal', [DashboardController::class, 'jadwal'])->name('jadwal');
});


Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/ubahBio', [StudentController::class, 'editBio'])->name('ubahbio');
    Route::get('/pendaftaran', [StudentController::class, 'index'])->name('pendaftaran');
    Route::get('/pendaftaran/kefasihan-quran', [StudentController::class, 'indexquran'])->name('pendaftaran.kefasihan');
    Route::get('/pendaftaran/kriteria-pendapatan', [StudentController::class, 'indexpendapatan'])->name('pendaftaran.pendapatan');
    Route::get('/pendaftaran/prestasi', [PrestasiController::class, 'index'])->name('pendaftaran.prestasi');

    #POST

    Route::post('/pendaftaran', [StudentController::class, 'store']);
    Route::put('/pendaftaran', [StudentController::class, 'update']);
    Route::put('/ubahBio', [StudentController::class, 'update']);
    Route::post('/pendaftaran/prestasi', [PrestasiController::class, 'store']);
    // Route::put('/pendaftaran/prestasi', [PrestasiController::class, 'store']);
    Route::put('/pendaftaran/kefasihan-quran', [StudentController::class, 'updatequran']);
    Route::put('/pendaftaran/kriteria-pendapatan', [StudentController::class, 'updatependapatan']);
});


Route::middleware(['auth', 'verified', Admin::class])
    ->controller(AdminController::class)
    ->group(function () {

        Route::resource('students', AdminController::class);

        Route::get('/admin', 'index')->name('admin');
    });

require __DIR__ . '/auth.php';
