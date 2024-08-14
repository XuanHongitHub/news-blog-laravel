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
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

use App\Mail\BlogMail;


Route::get('/', [NewsController::class, 'index'])->name('home');
// Route::get('/single-post/{slug}', [NewsController::class, 'single_post']);
Route::get('/single-post/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::post('/comments/replies', [CommentController::class, 'getReplies'])->name('comments.getReplies');
Route::post('/comments/store', [CommentController::class, 'store'])->name('comments.store');
Route::post('/comments/reply', [CommentController::class, 'store'])->name('comments.reply');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::delete('/replies/{id}', [CommentController::class, 'destroyReply'])->name('replies.destroy');

Route::get('/comments/{comment}/replies', [CommentController::class, 'getReplies']);

Route::get('/single-category/{slug}', [NewsController::class, 'single_category']);
Route::get('/all-posts', [NewsController::class, 'allPosts'])->name('all-posts');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/search-results', [NewsController::class, 'searchResults'])->name('search.results');




// Route::get("/sendMail", function(){
//     Mail::mailer('mailtrap'->send(new BlogMail));
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin

Route::middleware('role')->group(function () {

    Route::get('admin', [DashboardController::class, 'index'])->name('admin.index');
    // Route::resource('admin/dashboard', \App\Http\Controllers\AdminController::class);
    Route::resource('admin/categories', CategoryController::class);
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/news', PostController::class);

});

require __DIR__ . '/auth.php';



Auth::routes();


Route::get('/no-permission', function () {
    return view('frontend.pages.no-permission');
});

Route::get('/home', [App\Http\Controllers\NewsController::class, 'index'])->name('home');


