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

Route::get('/home', 'HomeController@index')->name('home');

//Route Admin
Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');

    Route::get('/logout', 'Auth\LoginController@logout')->name('admin.logout');
    Route::post('/logout', 'AuthAdmin\LoginController@Adminlogout')->name('admin.logout');

    // Route::get('/password/reset','AuthAdmin\ForgotPasswordController@ShowLinkRequestForm')->name('admin.password.request');
    // Route::post('/password/email','AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    
    // Route::get('/password/reset/{token}','AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    // Route::post('/password/reset','AuthAdmin\ResetPasswordController@reset');

    Route::get('/main_dasbor','Admin\DasborController@index')->name('admin.dasbor');
    Route::get('/main_dos','Admin\DosenController@index')->name('admin.dosen');
    Route::get('/main_dos/detail','Admin\DosenController@show')->name('admin.dosen.detail');

    Route::get('/buat_pengguna','Admin\PenggunaController@create')->name('admin.pengguna.buat');
    Route::post('/list_pengguna','Admin\PenggunaController@store')->name('admin.pengguna.store');
    Route::get('/list_pengguna','Admin\PenggunaController@index')->name('admin.pengguna.list');
    Route::get('/{id}/edit_pengguna','Admin\PenggunaController@edit')->name('admin.pengguna.edit');
    Route::patch('/{id}','Admin\PenggunaController@update');
    Route::delete('/{id}','Admin\PenggunaController@destroy')->name('admin.pengguna.delete');
    

    Route::get('/main_laporan','Admin\LaporanController@index')->name('admin.laporan');
    Route::get('/main_laporan/detail','Admin\LaporanController@show')->name('admin.laporan.detail'); 
});


//Route User1
Route::prefix('home')->group(function() {
    Route::get('/', function(){
    return view('user1.navbar');
    })->middleware(['role1','auth']);
  

    Route::get('/logout', 'Auth\LoginController@userLogout')->name('home.logout');
    Route::post('/logout', 'Auth\LoginController@userLogout')->name('home.logout');
    });


    //Route User2
Route::prefix('user2')->group(function(){
Route::get('/',function(){
        return view('user2.navbar');
    })->middleware(['role2','auth'])
    ;
    
Route::get('/logout', 'Auth\LoginController@userLogout')->name('user2.logout');
Route::post('/logout', 'Auth\LoginController@userLogout')->name('user2.logout');

});

Route::get('/pengguna_buat', function () {
    return view('admin.pengguna_buat');
});