<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['admin']], function () {
    Route::get('admin-view', [AdminController::class, 'index'])->name('admin.view');

    Route::post('/category', [AdminController::Class, 'store']);
    Route::delete('/category/delete/{id}', [AdminController::class, 'destroy']);
 });

require __DIR__.'/auth.php';
