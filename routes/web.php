<?php

use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ThreadController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('threads', [ThreadController::class, 'index']);
Route::get('threads/create', [ThreadController::class, 'create']);
Route::post('threads', [ThreadController::class, 'store']);
Route::get('threads/{channel}/{thread}', [ThreadController::class, 'show']);
Route::post('threads/{channel}/{thread}/replies', [ReplyController::class, 'store']);

require __DIR__.'/auth.php';
