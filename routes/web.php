<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PublicController::class, 'home'])->name('home');
Route::get('/profil', [\App\Http\Controllers\PublicController::class, 'profile'])->name('public.profile');
Route::get('/pemerintahan', [\App\Http\Controllers\PublicController::class, 'government'])->name('public.government');
Route::get('/informasi', [\App\Http\Controllers\PublicController::class, 'posts'])->name('public.posts');
Route::get('/informasi/{slug}', [\App\Http\Controllers\PublicController::class, 'postDetail'])->name('public.posts.detail');
Route::get('/galeri', [\App\Http\Controllers\PublicController::class, 'gallery'])->name('public.gallery');
Route::get('/statistik', [\App\Http\Controllers\PublicController::class, 'statistics'])->name('public.statistics');
Route::get('/kontak', [\App\Http\Controllers\PublicController::class, 'contact'])->name('public.contact');
Route::post('/aspirasi', [\App\Http\Controllers\PublicController::class, 'submitAspiration'])->name('public.aspiration.submit');

Route::get('/dashboard', function () {
    if (auth()->user()->isAdmin()) {
        return redirect()->route('admin.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('profile', \App\Http\Controllers\Admin\VillageProfileController::class)->only(['index', 'update']);
    Route::resource('officials', \App\Http\Controllers\Admin\VillageOfficialController::class);
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
    Route::resource('galleries', \App\Http\Controllers\Admin\GalleryController::class);
    Route::resource('stats', \App\Http\Controllers\Admin\PopulationStatController::class);
    Route::resource('aspirations', \App\Http\Controllers\Admin\AspirationController::class)->only(['index', 'show', 'destroy', 'update']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
