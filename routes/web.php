<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;


Route::get('/', [NewsController::class, 'index'])->name('home');
Route::get('/single-post/{slug}', [NewsController::class, 'single_post']);
Route::get('/single-category/{slug}', [NewsController::class, 'single_category']);
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/search-results', [NewsController::class, 'searchResults'])->name('search.results');


// Route::get('admin/dashboard', [DashboardController::class, 'index']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::group(['middleware' => ['admin']], function () {
// Admin
Route::get('admin', [DashboardController::class, 'index'])->name('admin');
// Route::resource('admin/dashboard', \App\Http\Controllers\AdminController::class);
Route::resource('admin/categories', CategoryController::class);
Route::resource('admin/users', UserController::class);

// });

require __DIR__ . '/auth.php';



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


