<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
|
| POST      | login                   | auth::             | App\Http\Controllers\Auth\AuthController@login                  | web,guest  |
| GET|HEAD  | login                   | auth::             | App\Http\Controllers\Auth\AuthController@showLoginForm          | web,guest  |
| GET|HEAD  | logout                  | auth::             | App\Http\Controllers\Auth\AuthController@logout                 | web        |
| POST      | password/email          | auth::             | App\Http\Controllers\Auth\PasswordController@sendResetLinkEmail | web,guest  |
| POST      | password/reset          | auth::             | App\Http\Controllers\Auth\PasswordController@reset              | web,guest  |
| GET|HEAD  | password/reset/{token?} | auth::             | App\Http\Controllers\Auth\PasswordController@showResetForm      | web,guest  |
| POST      | register                | auth::             | App\Http\Controllers\Auth\AuthController@register               | web,guest  |
| GET|HEAD  | register                | auth::             | App\Http\Controllers\Auth\AuthController@showRegistrationForm   | web,guest  |
|
*/
Route::group([
    'middleware' => ['web'],
], function () {
    Route::auth();
    Route::get('register', function () {
        return abort(404);
    });
    Route::post('register', function () {
        return abort(404);
    });
});

Route::group([
    'middleware' => ['web'],
    'as' => 'app::'
], function () {
    Route::get('/', [
        'as' => 'index',
        'uses' => function() {
            return view('index');
        }
    ]);
});
