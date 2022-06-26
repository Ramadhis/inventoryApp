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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'barang','as' => 'barang.' ,'middleware' => 'auth:web'],function (){
    Route::get('/', 'BarangmasukController@index')->name('index');
    Route::get('/add', 'BarangmasukController@add')->name('add');
    Route::post('/insert', 'BarangmasukController@insert')->name('insert');
    Route::get('/delete/{id}', 'BarangmasukController@delete')->name('delete');
    Route::get('/edit/{id}', 'BarangmasukController@edit')->name('edit');
    Route::post('/update', 'BarangmasukController@update')->name('update');

});
Route::group(['prefix' => 'order','as' => 'order.' ,'middleware' => 'auth:web'],function (){
    Route::get('/', 'BarangkeluarController@index')->name('index');
    Route::get('/add', 'BarangkeluarController@add')->name('add');
    Route::post('/insert', 'BarangkeluarController@insert')->name('insert');
    Route::get('/delete/{id}', 'BarangkeluarController@delete')->name('delete');
    Route::get('/edit/{id}', 'BarangkeluarController@edit')->name('edit');
    Route::post('/update', 'BarangkeluarController@update')->name('update');
    Route::get('/export_excel', 'BarangkeluarController@export_excel')->name('export_excel');
});
Route::group(['prefix' => 'member','as' => 'member.' ,'middleware' => 'auth:web'],function (){
    Route::get('/', 'MemberController@index')->name('index');
    Route::get('/add', 'MemberController@add')->name('add');
    Route::post('/insert', 'MemberController@insert')->name('insert');
    Route::get('/delete/{id}', 'MemberController@delete')->name('delete');
    Route::get('/edit/{id}', 'MemberController@edit')->name('edit');
    Route::post('/update', 'MemberController@update')->name('update');
});

Route::group(['prefix' => 'logbarang','as' => 'logbarang.' ,'middleware' => 'auth:web'],function (){
    Route::get('/', 'LogbarangController@index')->name('index');
});
