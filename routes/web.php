<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WriterController;

Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/categoria/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
Route::get('/article/utente/{user}', [ArticleController::class, 'byUser'])->name('article.byUser');
Route::get('/article/search', [ArticleController::class, 'articleSearch'])->name('article.search');

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

    Route::put('/admin/edit/tag/{tag}', [AdminController::class, 'editTag'])->name('admin.editTag');
    Route::delete('/admin/delete/tag/{tag}', [AdminController::class, 'deleteTag'])->name('admin.deleteTag');

    Route::put('/admin/edit/category/{category}', [AdminController::class, 'editCategory'])->name('admin.editCategory');
    Route::delete('/admin/delete/category/{category}', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');
    Route::post('/admin/category/store', [AdminController::class, 'storeCategory'])->name('admin.storeCategory');
});

Route::middleware('revisor')->group(function () {
    Route::get('/revisor/dashboard', [App\Http\Controllers\RevisorController::class, 'dashboard'])->name('revisor.dashboard');
    Route::patch('/revisor/acceptArticle/{article}', [App\Http\Controllers\RevisorController::class, 'acceptArticle'])->name('revisor.acceptArticle');
    Route::patch('/revisor/rejectArticle/{article}', [App\Http\Controllers\RevisorController::class, 'rejectArticle'])->name('revisor.rejectArticle');
    Route::patch('/revisor/undoArticle/{article}', [App\Http\Controllers\RevisorController::class, 'undoArticle'])->name('revisor.undoArticle');
});

Route::middleware('writer')->group(function () {
    Route::get('/writer/dashboard', [WriterController::class, 'dashboard'])->name('writer.dashboard');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/article/update/{article}', [ArticleController::class, 'update'])->name('article.update');
});

Route::delete('/article/destroy/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
