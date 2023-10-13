<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});



Route::resource('languages', LanguageController::class);
Route::get('languages/{language}/options', [LanguageController::class, 'options'])->name('languages.options');
Route::put('languages/{language}/options', [LanguageController::class, 'optionsUpdate'])->name('languages.options.update');



Route::get('posts-edit/{post}/{language?}', [PostController::class, 'editPost'])->name('posts.editPost');
Route::put('posts-edit/{post}/{language?}', [PostController::class, 'updatePost'])->name('posts.updatePost');
Route::resource('posts', PostController::class);
