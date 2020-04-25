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
Route::get('/', function () {
    return view('Auths.login');
});
Route::get('/login','SiswaController@login')->name('login');
Route::post('/postlogin','SiswaController@postlogin');
Route::get('/logout','SiswaController@logout');
Route::group(['middleware'=>['auth','CheckRole:Admin,siswa']],function(){
    Route::get('/user','UserController@index');
    Route::post('/user/create','UserController@create');
    Route::get('/user/{id}','UserController@edit');
    Route::post('/user/update','UserController@update');
    Route::get('/user/{id}/delete','UserController@delete');
    Route::get('/user/{id}/profile','UserController@profile');
    Route::get('/ganti/password','UserController@ganti_password');
});
Route::group(['middleware'=>['auth','CheckRole:Admin,siswa']],function(){
    Route::get('/dashboard','DashboardController@index');
    Route::get('/dashboard/{id}/{maklon_id}/detail','DashboardController@detail');
    Route::get('/dashboard/{id}/{revisi_id}/{maklon_id}/{id_pkp}/tabular','DashboardController@tabular');
    Route::post('/reset/{id}','DashboardController@resetpkp');
});
Route::group(['middleware'=>['auth','CheckRole:Admin,siswa']],function(){
    Route::get('/project', 'ProjectController@index');
    Route::get('/project/{$id}','ProjectController@idpkp');
    Route::get('/project/{id}/detail', 'ProjectController@view');
    Route::post('/createmaklon','ProjectController@create_maklon');
    Route::get('/project/create','ProjectController@create');
    Route::post('/project/store','ProjectController@store');
    Route::get('/project/{id}/info', 'ProjectController@info');
    Route::get('/project/{id}/maklon', 'ProjectController@info_maklon');
    Route::get('/project/var/edit', 'ProjectController@edit');
    Route::get('/project/moudelete/{id}', 'ProjectController@delete_mou');
    Route::get('/project/{id}', 'ProjectController@index');
    Route::get('/project/{id}/releted/delete', 'ProjectController@deletereleted');
    Route::get('/{id}/tabular/delete', 'DashboardController@deletemaklonproject');
    Route::get('/project/{id}/delete', 'ProjectController@delete');
    Route::get('/project/{id}/restore', 'ProjectController@restore');
    Route::get('/project/{id}/edit', 'ProjectController@edits');
    Route::post ('/project/penjajakan/{id}/update', 'ProjectController@updateReleted');
    Route::post ('/project/{id}/updatelegal', 'LegalitasController@update_legal');
    Route::post('/project/{id}/update', 'ProjectController@update');
});
