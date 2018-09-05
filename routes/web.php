<?php


// Auth::routes();

Route::get('/', function () {
    return view('coba');
});


//Route Admin
Route::prefix('admin')->group(function() {

    Route::get('/', 'AuthAdmin\AdminController@index')->name('admin.home');
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'AuthAdmin\LoginController@Adminlogout')->name('admin.logout');
    Route::resource('/permission', 'Admin\PermissionController', ['as' => 'admin']);
    Route::resource('/role', 'Admin\RoleController', ['as' => 'admin']);
    
    Route::resource('/akunhonor','Admin\PenggunaController');
    Route::patch('/akunhonor/{id}/update','Admin\PenggunaController@update');
    
    Route::resource('/akunadmin', 'Admin\AdminBuatController');
    Route::patch('/akunadmin/{id}/update','Admin\AdminBuatController@update');

    Route::resource('/akunkegiatan', 'Admin\PenggunaKegiatanController');
    Route::patch('/akunkegiatan/{id}/update','Admin\PenggunaKegiatanController@update');

    Route::resource('/akunpembukuan', 'Admin\PenggunaPembukuanController');
    Route::patch('/akunpembukuan/{id}/update','Admin\PenggunaPembukuanController@update');

});

// Route Pajak Kegiatan
Route::prefix('pajak')->group(function() {

    Route::get('/login','AuthKegiatan\LoginController@showLoginForm')->name('pajak.login');
    Route::post('/login','AuthKegiatan\LoginController@login')->name('pajak.login.submit');
    Route::get('/', 'AuthKegiatan\UserKegiatanController@index')->name('pajak.home');
    Route::post('/logout', 'AuthKegiatan\LoginController@Kegiatanlogout')->name('pajak.logout');

    Route::get('/riwayat','Riwayat\RiwayatController@index')->name('riwayat.index');
    Route::post('/riwayatsearch','Riwayat\RiwayatController@search')->name('riwayat.search');
    Route::get('/riwayatshow','Riwayat\RiwayatController@show')->name('riwayat.show');
    Route::get('/downloadPDF/{id}','Riwayat\RiwayatController@exportpdf')->name('riwayat.pdf');
    
});

// Route Honor
Route::prefix('honor')->group(function() {

    Route::get('/login','AuthHonor\LoginController@showLoginForm')->name('honor.login');
    Route::post('/login','AuthHonor\LoginController@login')->name('honor.login.submit');
    Route::get('/', 'AuthHonor\UserHonorController@index')->name('honor.home');
    Route::post('/logout', 'AuthHonor\LoginController@HonorLogout')->name('honor.logout');

    Route::resource('/honordosen','Honor\HonorController');
    Route::get('honordosen/{id}/create','Honor\HonorController@create')->name('honor.form');
    Route::get('honordosen/{id}/delete', ['as' => 'honordosen.delete', 'uses' => 'Honor\HonorController@delete']);
    Route::post('honordosen/{id}/store','Honor\HonorController@storedata');
    Route::get('honordosen/{id}/isionline','Honor\HonorController@IsiOnline')->name('honor.online');
    Route::get('honordosen/{id}/isioffline','Honor\HonorController@IsiOffline')->name('honor.offline');
    Route::get('/downloadPDF/{id}','Honor\HonorController@exportpdf')->name('honor.pdf');

    Route::get('/kegiatancreate','Kegiatan\KegiatanController@create')->name('regis.kegiatan');
    Route::post('/kegiatan/store','Kegiatan\KegiatanController@store')->name('store.kegiatan');

    Route::get('/honordosen/{id}/tambahisi','Honor\TambahIsiController@create')->name('tambahisi.create');
    Route::post('/tambahisi/{id}/store','Honor\TambahIsiController@store')->name('tambahisi.tambah');

    Route::get('/honordosen/{id}/tambahedit','Honor\TambahEditController@create')->name('tambahedit.createIsi');
    Route::post('/tambahedit/{id}/store','Honor\TambahEditController@store')->name('tambahedit.tambah');

    Route::post('honor/export-excel/{lapHonorId}', 'Honor\HonorController@exportExcel')->name('honor.honor.export-excel');
    Route::post('honor/import-excel/', 'Honor\HonorController@importExcel')->name('honor.honor.import-excel');

    Route::get('honordosen/{id}/complete','Honor\HonorController@complete')->name('honor.complete');

    // Route::get('/riwayat','Riwayat\RiwayatController@index')->name('riwayat.index');
    // Route::post('/riwayatsearch','Riwayat\RiwayatController@search')->name('riwayat.search');
    // Route::get('/riwayatshow','Riwayat\RiwayatController@show')->name('riwayat.show');
});

//Route Pembukuan
Route::prefix('rekaphonor')->group(function() {
    Route::get('/login','AuthPembukuan\LoginController@showLoginForm')->name('pembukuan.login');
    Route::post('/login','AuthPembukuan\LoginController@login')->name('pembukuan.login.submit');
    Route::get('/', 'AuthPembukuan\UserPembukuanController@index')->name('pembukuan.home');
    Route::post('/logout', 'AuthPembukuan\LoginController@Pembukuanlogout')->name('pembukuan.logout');

    Route::get('/list','Pembukuan\PembukuanController@index')->name('pembukuan.index');
    Route::get('/show','Pembukuan\PembukuanController@show')->name('pembukuan.show');
});



//Route User1
// Route::prefix('home')->group(function() {
//     Route::get('/', function(){
//     return view('user1.navbar');
//     })->middleware(['role1','auth']);
  

//     Route::get('/logout', 'Auth\LoginController@userLogout')->name('home.logout');
//     Route::post('/logout', 'Auth\LoginController@userLogout')->name('home.logout');
//      });


    //Route User2
// Route::prefix('user2')->group(function(){
// Route::get('/',function(){
//         return view('user2.navbar');

        
//     })->middleware(['role2','auth']);
    
// Route::get('/logout', 'Auth\LoginController@userLogout')->name('user2.logout');
// Route::post('/logout', 'Auth\LoginController@userLogout')->name('user2.logout');

// Route::resource('/honor','Honor\HonorController');
// Route::get('honor/{id}/create','Honor\HonorController@create')->name('honor.form');
// Route::post('honor/{id}/store','Honor\HonorController@store');

// Route::get('honor/{id}/tambahisi','Honor\TambahIsiController@create')->name('tambahisi.create');
// Route::post('honor/{id}/store','Honor\TambahIsiController@store')->name('tambahisi.tambah');

// Route::get('honor/{id}/tambahedit','Honor\TambahEditController@create')->name('tambahedit.createIsi');
// Route::post('honor/{id}/store','Honor\TambahEditController@store')->name('tambahedit.tambah');

// });

// Route::get('/pengguna_buat', function () {
//     return view('admin.pengguna_buat');
// });