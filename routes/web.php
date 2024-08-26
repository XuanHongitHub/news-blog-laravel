<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentsAdminController;



Route::get('/', [NewsController::class, 'index'])->name('home');


Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/search-results', [NewsController::class, 'searchResults'])->name('search.results');

// Danh Mục, Chi Tiết Tin, Bình Luận
Route::get('/single-category/{slug}', [NewsController::class, 'single_category']);
Route::get('/all-posts', [NewsController::class, 'allPosts'])->name('all-posts');
Route::get('/single-post/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::post('/comment/replies', [CommentController::class, 'getReplies'])->name('comment.getReplies');
Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');
Route::post('/comment/reply', [CommentController::class, 'store'])->name('comment.reply.store');
Route::post('/comment/reply-ajax', [CommentController::class, 'storeReply'])->name('comment.reply-ajax');

Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');
Route::delete('/comment/reply/{id}', [CommentController::class, 'destroyReply']);
Route::get('/comment/{comment}/replies', [CommentController::class, 'getReplies']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Admin
Route::middleware('role')->group(function () {

    Route::get('admin', [DashboardController::class, 'index'])->name('admin.index');
    Route::resource('admin/categories', CategoryController::class);
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/news', PostController::class);
    Route::resource('admin/comments', CommentsAdminController::class);

});

require __DIR__ . '/auth.php';



Auth::routes();


Route::get('/no-permission', function () {
    return view('frontend.pages.no-permission');
});

Route::get('/home', [App\Http\Controllers\NewsController::class, 'index'])->name('home');


