<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('roles', 'RoleAPIController');

Route::resource('users', 'UserAPIController');

Route::resource('profiles', 'ProfileAPIController');

Route::group(['namespace' => 'Authencations','prefix' => 'auths'], function(){
        Route::post('login', 'LoginController@login');
       
});

Route::resource('tasks', 'TaskAPIController');
Route::get('tasks/list/{id}', 'TaskAPIController@showTasks');

Route::resource('activities', 'ActivityAPIController');

Route::resource('pictures', 'PictureAPIController');
Route::post('pictures/uploadImage', 'PictureAPIController@saveImage');