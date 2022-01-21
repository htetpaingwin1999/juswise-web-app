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

Route::get('/', 'JusDbController@index')->name('index');
Route::view('/about-us', 'juswise-theme.about')->name('about');
Route::view('/donate-us', 'juswise-theme.donate')->name('donate');
Route::get('/jusx-databases', 'JusDbController@jusxDb')->name('jusxDb');
Route::get('/detail/{slug}', 'JusDbController@detail')->name('db.detail');
Route::get('/category/{id}', 'JusDbController@baseOnCategory')->name('baseOnCategory');
Route::get('/search-date', 'JusDbController@baseOnDate')->name('baseOnDate');

// Feedback Route
Route::get('/feedback', 'FeedbackController@index')->name('feedback.index');
Route::post('/give-feedback', 'FeedbackController@setRating')->name('feedback.setRating');

Auth::routes();

Route::middleware(['auth', 'isBanned'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
    });

    Route::middleware('AdminOnly')->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::resource('category', 'CategoryController');
            Route::resource('problem', 'ProblemController');
        });

        // User Manager
        Route::get('/user-manager', 'UserManagerController@index')->name('user-manager.index');
        Route::get('/user-manager/control-permission', 'UserManagerController@controlPermission')->name('user-manager.control');
        Route::post('/user-manager/make-admin', 'UserManagerController@makeAdmin')->name('user-manager.makeAdmin');
        Route::post('/user-manager/make-case-volunteer', 'UserManagerController@makeVolunteer')->name('user-manager.volunteer');
        Route::post('/user-manager/make-user', 'UserManagerController@makeUser')->name('user-manager.makeUser');
        Route::post('/user-manager/ban-user', 'UserManagerController@banUser')->name('user-manager.banUser');
        Route::post('/user-manager/unlock-user', 'UserManagerController@unLockUser')->name('user-manager.unlockUser');


        Route::prefix('profile')->group(function () {
            Route::get('/', 'ProfileController@profile')->name('profile');
            Route::get('/edit-profile', 'ProfileController@editProfile')->name('profile.editProfile');
            Route::get('/change-password', 'ProfileController@changePassword')->name('profile.changePassword');

            Route::post('/change-name-email', 'ProfileController@changeNameEmail')->name('profile.changeNameEmail');
            Route::post('/update-photo', 'ProfileController@updatePhoto')->name('profile.updatePhoto');
            Route::post('/update-password', 'ProfileController@updatePassword')->name('profile.updatePassword');
        });
    });
});
