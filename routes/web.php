<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
use App\Http\Controllers\AdminController;

Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/categoria/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
Route::get('/article/utente/{user}', [ArticleController::class, 'byUser'])->name('article.byUser');

Route::get('/careers', [PublicController::class, 'careers'])->name('careers');
Route::post('/careers/submit', [PublicController::class, 'careersSubmit'])->name('careers.submit');

Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::patch('/admin/setAdmin/{user}', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    Route::patch('/admin/setRevisor/{user}', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    Route::patch('/admin/setWriter/{user}', [AdminController::class, 'setWriter'])->name('admin.setWriter');
    
    Route::patch('/admin/rejectAdmin/{user}', [AdminController::class, 'rejectAdmin'])->name('admin.rejectAdmin');
    Route::patch('/admin/rejectRevisor/{user}', [AdminController::class, 'rejectRevisor'])->name('admin.rejectRevisor');
    Route::patch('/admin/rejectWriter/{user}', [AdminController::class, 'rejectWriter'])->name('admin.rejectWriter');
    
    Route::patch('/admin/revokeAdmin/{user}', [AdminController::class, 'revokeAdmin'])->name('admin.revokeAdmin');
    Route::patch('/admin/revokeRevisor/{user}', [AdminController::class, 'revokeRevisor'])->name('admin.revokeRevisor');
    Route::patch('/admin/revokeWriter/{user}', [AdminController::class, 'revokeWriter'])->name('admin.revokeWriter');
});

Route::middleware('revisor')->group(function () {
    Route::get('/revisor/dashboard', [App\Http\Controllers\RevisorController::class, 'dashboard'])->name('revisor.dashboard');
    Route::patch('/revisor/acceptArticle/{article}', [App\Http\Controllers\RevisorController::class, 'acceptArticle'])->name('revisor.acceptArticle');
    Route::patch('/revisor/rejectArticle/{article}', [App\Http\Controllers\RevisorController::class, 'rejectArticle'])->name('revisor.rejectArticle');
    Route::patch('/revisor/undoArticle/{article}', [App\Http\Controllers\RevisorController::class, 'undoArticle'])->name('revisor.undoArticle');
});
