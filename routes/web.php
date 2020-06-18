<?php

Route::get('/', function () {
	return view('/auths/login');
});


Route::group(['middleware' => 'auth'],function(){
	
	// Route::get('/peserta','PesertaController@index');
	// Route::post('/peserta/create','PesertaController@create');
	Route::get('/peserta/{id_peserta}/edit2','PesertaController@edit2');
	// Route::post('/peserta/{id_peserta}/update','PesertaController@update');
	Route::get('/peserta/{id_peserta}/delete','PesertaController@delete');
	Route::resource('peserta','PesertaController');

	// Route::get('/kategori','KategoriController@index');
	// Route::post('/kategori/create','KategoriController@create');
	// Route::get('/kategori/{id_kategori}/edit','KategoriController@edit');
	// Route::post('/kategori/{id_kategori}/update','KategoriController@update');
	Route::get('/kategori/{id}/delete','KategoriController@delete');
	Route::resource('kategori','KategoriController');

	Route::get('/ikan','IkanController@index');
	Route::put('/ikan/create','IkanController@create');
	Route::get('/ikan/{id}/edit','IkanController@edit');
	Route::post('/ikan/{id}/update','IkanController@update');
	Route::post('/ikan/{id}/update2','IkanController@update2');
	Route::get('/ikan/{id}/delete','IkanController@delete');
	Route::resource('ikan', 'IkanController');

	// Route::get('/user','UserController@index');
	// Route::post('/user/create','UserController@create');
	// Route::get('/user/{id}/edit','UserController@edit');
	// Route::post('/user/{id}/update','UserController@update');
	Route::get('/user/{id}/delete','UserController@delete');
	Route::resource('user', 'UserController');

	Route::get('/nilai','NilaiController@index');
	Route::put('/nilai/create','NilaiController@create');
	Route::post('/nilai/create','NilaiController@create');
	Route::get('/nilai/{id}/edit','NilaiController@edit');
	Route::put('/nilai/store','NilaiController@store');
	Route::post('/nilai/{id}/update','NilaiController@update');
	Route::get('/nilai/{id}/delete','NilaiController@delete');
	Route::get('/nilai/{id}/nilai','NilaiController@nilai');
	// Route::resource('nilai', 'NilaiController');
});


Route::get('/dashboard', 'DashboardController@index')->middleware('auth');
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

