<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/articles', [ArticleController::class,'index'])->name('articles.show');
Route::get('/articles/{article:slug}', [ArticleController::class,'show'])->name('articles.show');
Route::post('/articles/{article}/comments', [CommentController::class, 'store'])->name('comments.create');
Route::patch('/articles/{articleId}/likes', [ArticleController::class, 'increaseArticleLikesCounter'])->name('articleLikes.update');
Route::patch('/articles/{articleId}/views', [ArticleController::class, 'increaseArticleViewsCounter'])->name('articleViews.update');
