<?php

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
Auth::routes();
Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'CreateController@index');
    Route::get('/reg', 'CreateController@create');
    Route::post('/add/user', 'CreateController@store');
    Route::get('/user/edit/{id}', 'CreateController@edit');
    Route::post('/user/edit/{id}', 'CreateController@update');
    Route::get('/user/delete/{id}', 'CreateController@destroy');
    Route::get('/user/changePassword/{id}', 'CreateController@password');
    Route::post('/user/changePassword/{id}', 'CreateController@change');

    //Route://Role//

    Route::get('/role', 'RoleController@index');
    Route::get('/create', 'RoleController@create');
    Route::post('/store/role', 'RoleController@store');
    Route::get('/editRole/{id}', 'RoleController@edit');
    Route::post('/editRole/{id}', 'RoleController@update');
    Route::get('/delete/role/{id}', 'RoleController@destroy');

    //Route://Permission//

    Route::get('/permission', 'PermissionController@index');
    Route::post('/store/permission', 'PermissionController@store');
    Route::get('/edit/permision/{id}', 'PermissionController@edit');
    Route::post('/edit/permision/{id}', 'PermissionController@update');
    Route::get('/role/delete/{id}', 'PermissionController@destroy');

    Route::get('/home', 'HomeController@index')->name('home');
});
