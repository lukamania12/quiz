<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'list'])->name('posts.list');
Route::get('posts/cud/{post?}', [PostController::class, 'createorupdate'])->name('posts.edit');
Route::get('posts/{id}', [PostController::class, 'post'])->name('posts.post');
Route::get('posts/quiz/{id}', [PostController::class, 'postquiz'])->name('posts.quiz');
Route::get('answers', [PostController::class, 'correctanswers'])->name('final');
Route::prefix('admin')->get('panelqst', [PostController::class, 'adminpanelqst'])->name('adminpanel.qst');
Route::prefix('admin')->get('panelquiz', [PostController::class, 'adminpanelquiz'])->name('adminpanel.quiz');
Route::prefix('admin')->get('edit/{post?}', [PostController::class, 'adminpaneledit'])->name('adminpanel.edit');

Route::middleware('auth')->group(function () {
    Route::get('/private', [PostController::class, 'pr_list'])->name('posts.prpost');
    Route::get('posts/deleteqz/{post}', [PostController::class, 'deletequiz'])->name('posts.deleteqz');
    Route::get('posts/delete/{post}', [PostController::class, 'delete'])->name('posts.delete');
    Route::get('logout', [ProfileController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    Route::get('/posts/cud/upload/{post}', [PostController::class, 'upload'])->name('admin.upload');
});


require __DIR__.'/auth.php';
