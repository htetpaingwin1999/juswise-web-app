<?php

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

Auth::routes();



Route::middleware('auth')->group(function () {

    Route::prefix('dashboard')->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::resource('category', 'CategoryController');
        Route::resource('problem', 'ProblemController');
        Route::resource('article', 'ArticleController');
        Route::resource('article-category', 'ArticleCategoryController');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', 'ProfileController@profile')->name('profile');
        Route::get('/edit-profile', 'ProfileController@editProfile')->name('profile.editProfile');
        Route::get('/change-password', 'ProfileController@changePassword')->name('profile.changePassword');

        Route::post('/change-name-email', 'ProfileController@changeNameEmail')->name('profile.changeNameEmail');
        Route::post('/update-photo', 'ProfileController@updatePhoto')->name('profile.updatePhoto');
        Route::post('/update-password', 'ProfileController@updatePassword')->name('profile.updatePassword');
    });
});
