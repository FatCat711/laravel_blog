<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureUserIsAdmin;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Route::group(['prefix' => "ideas/", 'as' => 'ideas.'], function () {

//     // Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');

//     Route::group(['middleware' => ['auth']], function () {
//         // Route::post('', [IdeaController::class, 'store'])->name('store');

//         // Route::delete('/{id}', [IdeaController::class, 'destroy'])->name('destroy');

//         // Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');

//         // Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');

//         // Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');
//     });
// });

Route::resource('ideas', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth');

Route::resource('ideas', IdeaController::class)->only(['show']);

Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth');

Route::resource('users', UserController::class)->only('show',);
Route::resource('users', UserController::class)->only('edit', 'update')->middleware('auth');

Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');

Route::get('profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');

Route::post('users/{idea}/like', [IdeaLikeController::class, 'like'])->middleware('auth')->name('ideas.like');
Route::post('users/{idea}/unlike', [IdeaLikeController::class, 'unlike'])->middleware('auth')->name('ideas.unlike');

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->name("logout");

Route::get('/feed', FeedController::class)->name('feed')->middleware('auth');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'can:admin']);
