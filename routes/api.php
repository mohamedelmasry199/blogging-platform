<?php

use App\Http\Controllers\Api\V1\ArticleController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ReaderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('v1')->group(function () {


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register',[AuthController::class , 'register'])->name('register');
Route::post('/login',[AuthController::class , 'login'])->name('login');
Route::middleware('auth:sanctum')->group(function () {
    Route::delete('/logout', [AuthController::class, 'logout']);
});
Route::middleware(['auth:sanctum', 'role:author'])
    ->prefix('author')
    ->as('author.')
    ->group(function () {
        Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
        Route::post('/article', [ArticleController::class, 'store'])->name('article.store');
        Route::patch('/articles/toggle-activation/{article}', [ArticleController::class, 'toggleActivation'])->name('articles.toggleActivation');
        Route::patch('/articles/toggle-featured/{article}', [ArticleController::class, 'toggleFeature'])->name('articles.toggleFeatured');
    });

Route::middleware(['auth:sanctum', 'role:reader'])
->prefix('reader')
->as('reader.')
->group(function () {
    Route::get('/articles', [ReaderController::class, 'articles'])->name('articles');
    Route::get('/article/{article}', [ReaderController::class, 'ShowArticle'])->name('article.show');
    Route::post('/articles/{article}', [ReaderController::class, 'reactArticle'])->name('articles.react');
});
});
