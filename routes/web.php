<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
|
| Laravel自动生成的注册、登录、找回密码等功能的路由
|
*/
Auth::routes();

/*
|--------------------------------------------------------------------------
| 首页
|--------------------------------------------------------------------------
|
| 将首页直接跳转至登录页面
|
*/
Route::get('/', function () {
    return redirect('/login');
})->middleware('guest');

/*
|--------------------------------------------------------------------------
| 登录后用户首页
|--------------------------------------------------------------------------
|
| 登录后的用户跳转至此页面
|
*/
Route::get('/home', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| 管理后台
|--------------------------------------------------------------------------
|
| Url为:/admin/*
|
*/
Route::group([
        'prefix'=> 'admin',
        'namespace'=>'Admin',
        'middleware'=>'role:admin'
    ], function(){
    Route::resource('users', 'UserController');
});

/*
|--------------------------------------------------------------------------
| 项目申报
|--------------------------------------------------------------------------
|
| Url为:/project
|
*/
Route::group([
    'prefix'=> 'project',
    'middleware'=>'role:xmfzr'
], function(){
    Route::get('/', 'ProjectController@index')->name('projects.index');
    Route::post('/', 'ProjectController@store')->name('projects.store');
    Route::get('/create', 'ProjectController@create')->name('projects.create');
    Route::get('/{project}/edit/{step?}', 'ProjectController@edit')->name('projects.edit');
    Route::put('/{project}/edit/{step?}', 'ProjectController@update')->name('projects.update');
    Route::get('/{project}/{step?}', 'ProjectController@show')->name('projects.show');
    Route::delete('/{project}', 'ProjectController@destroy')->name('projects.destroy');
    Route::put('/{project}/step/{step}', 'ProjectController@stepUpdate')->name('projects.steps.update');
    Route::get('/{project}/step/{step}/edit', 'ProjectController@stepEdit')->name('projects.steps.edit');
});
Route::group(['prefix'=> 'project',], function(){
    Route::get('/{project}/step/{step}', 'ProjectController@stepShow')->name('projects.steps.show');
});
