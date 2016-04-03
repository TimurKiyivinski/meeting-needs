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
], function () {
    Route::auth();
});

Route::group([
    'middleware' => ['web'],
    'as' => 'app::'
], function () {
    Route::get('/', [
        'as' => 'index',
        'uses' => 'HomeController@index'
    ]);

    Route::get('/news', [
        'as' => 'news',
        'uses' => 'NewsController@index'
    ]);
    Route::get('/news/{id}', [
        'as' => 'event.show',
        'uses' => 'NewsController@show'
    ])->where('id', '[0-9]+');

    Route::get('/events', [
        'as' => 'events',
        'uses' => 'EventController@index'
    ]);
    Route::get('/events/{id}', [
        'as' => 'event.show',
        'uses' => 'EventController@show'
    ])->where('id', '[0-9]+');

    Route::get('/organizations', [
        'as' => 'organizations',
        'uses' => 'OrganizationController@index'
    ]);
    Route::get('/organizations/{id}', [
        'as' => 'organization.show',
        'uses' => 'OrganizationController@show'
    ])->where('id', '[0-9]+');

    Route::get('/recipients', [
        'as' => 'recipients',
        'uses' => 'RecipientController@index'
    ]);
    Route::get('/recipients/{id}', [
        'as' => 'recipient.show',
        'uses' => 'RecipientController@show'
    ])->where('id', '[0-9]+');

    Route::get('/organizations', [
        'as' => 'organizations',
        'uses' => 'OrganizationController@index'
    ]);
    Route::get('/organizations/{id}', [
        'as' => 'organization.show',
        'uses' => 'OrganizationController@show'
    ])->where('id', '[0-9]+');
});

Route::group([
    'middleware' => ['web', 'auth'],
    'as' => 'app::'
], function () {
    Route::get('/volunteers', [
        'as' => 'volunteers',
        'uses' => 'VolunteerController@index'
    ]);
    Route::get('/volunteers/{id}', [
        'as' => 'volunteer.show',
        'uses' => 'VolunteerController@show'
    ])->where('id', '[0-9]+');
});

Route::group([
    'as' => 'api::',
    'prefix' => 'api',
    'namespace' => 'API',
], function () {
    Route::resource('organization', 'OrganizationController', [
        'only' => ['index', 'show'],
        'names' => [
            'index' => 'organization.index',
            'show' => 'organization.show',
        ]
    ]);
    Route::resource('location', 'LocationController', [
        'only' => ['index', 'show'],
        'names' => [
            'index' => 'location.index',
            'show' => 'location.show',
        ]
    ]);
    Route::resource('event', 'EventController', [
        'only' => ['index', 'show'],
        'names' => [
            'index' => 'event.index',
            'show' => 'event.show',
        ]
    ]);
    Route::resource('recipient', 'RecipientController', [
        'only' => ['index', 'show'],
        'names' => [
            'index' => 'recipient.index',
            'show' => 'recipient.show',
        ]
    ]);
    Route::resource('photo', 'PhotoController', [
        'only' => ['index', 'show'],
        'names' => [
            'index' => 'photo.index',
            'show' => 'photo.show',
        ]
    ]);
    Route::resource('news', 'NewsController', [
        'only' => ['index', 'show'],
        'names' => [
            'index' => 'news.index',
            'show' => 'news.show',
        ]
    ]);
    Route::resource('user', 'UserController', [
        'only' => ['index', 'show'],
        'names' => [
            'index' => 'user.index',
            'show' => 'user.show',
        ]
    ]);
    Route::resource('userevent', 'UserEventController', [
        'only' => ['index', 'show'],
        'names' => [
            'index' => 'userevent.index',
            'show' => 'userevent.show',
        ]
    ]);
});

Route::group([
    'middleware' => ['auth'],
    'as' => 'api::',
    'prefix' => 'api',
    'namespace' => 'API',
], function () {
    Route::resource('organization', 'OrganizationController', [
        'only' => ['store', 'update', 'destroy'],
        'names' => [
            'store' => 'organization.store',
            'update' => 'organization.update',
            'destroy' => 'organization.destroy'
        ]
    ]);
    Route::resource('location', 'LocationController', [
        'only' => ['store', 'update', 'destroy'],
        'names' => [
            'store' => 'location.store',
            'update' => 'location.update',
            'destroy' => 'location.destroy'
        ]
    ]);
    Route::resource('event', 'EventController', [
        'only' => ['store', 'update', 'destroy'],
        'names' => [
            'store' => 'event.store',
            'update' => 'event.update',
            'destroy' => 'event.destroy'
        ]
    ]);
    Route::resource('recipient', 'RecipientController', [
        'only' => ['store', 'update', 'destroy'],
        'names' => [
            'store' => 'recipient.store',
            'update' => 'recipient.update',
            'destroy' => 'recipient.destroy'
        ]
    ]);
    Route::resource('photo', 'PhotoController', [
        'only' => ['store', 'update', 'destroy'],
        'names' => [
            'store' => 'photo.store',
            'update' => 'photo.update',
            'destroy' => 'photo.destroy'
        ]
    ]);
    Route::resource('news', 'NewsController', [
        'only' => ['store', 'update', 'destroy'],
        'names' => [
            'store' => 'news.store',
            'update' => 'news.update',
            'destroy' => 'news.destroy'
        ]
    ]);
    Route::resource('user', 'UserController', [
        'only' => ['store', 'update', 'destroy'],
        'names' => [
            'store' => 'user.store',
            'update' => 'user.update',
            'destroy' => 'user.destroy'
        ]
    ]);
    Route::resource('userevent', 'UserEventController', [
        'only' => ['store', 'update', 'destroy'],
        'names' => [
            'store' => 'userevent.store',
            'update' => 'userevent.update',
            'destroy' => 'userevent.destroy'
        ]
    ]);
});
