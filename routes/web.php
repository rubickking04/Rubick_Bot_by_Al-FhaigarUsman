<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleGenerator;

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
    return redirect('/chat');
});
Route::get('/chat', function () {
    $title = '';
    $content = '';
    return view('welcome', compact('title', 'content'));
});
Route::post('/chat/generate', [ArticleGenerator::class, 'index']);
