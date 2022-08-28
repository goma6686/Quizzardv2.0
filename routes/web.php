<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Middleware\Authenticate;


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

Route::get('/', function () {
    return view('welcome');
});

//user-related
Route::get('/user/{id}', [UserController::class, 'show'])->name('profile');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('edit-user');
Route::post('/user/update/{id}', [UserController::class, 'update'])->name('update-user');

//tik prisijungusiems
Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/leaderboard', [UserController::class, 'leaderboard'])->name('leaderboard');

    Route::get('/create', [QuestionController::class, 'index'])->name('create-question');
    Route::post('/create-question', [QuestionController::class, 'store']);
    Route::get('/game', [QuizController::class, 'quiz'])->name('question');
    Route::post('/ans', [QuizController::class, 'store']);
});

//tik adminam
Route::group(['middleware' => ['admin']], function () {
    Route::get('admin-view', [AdminController::class, 'index'])->name('admin.view');

    Route::delete('/user/delete/{id}', [UserController::class, 'destroy']);

    Route::post('/category', [AdminController::class, 'store']);
    Route::delete('/category/delete/{id}', [AdminController::class, 'destroy_category']);

    Route::post('/update/answer/{id}', [AdminController::class, 'update_answer'])->name('answer.update');

    Route::post('/update/question/{id}', [AdminController::class, 'update_question'])->name('question.update');
    Route::delete('/question/delete/{id}', [AdminController::class, 'destroy_question']);
 });

 Auth::routes();

require __DIR__.'/auth.php';
