<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

 // TODO : URL untuk website Pengguna

    // ?url HomePage
Route::get('/', 'PagesController@homePage');

    // ? url Profile Sekolah SD - SMP
Route::get('/profile-sekolah/{slug}', 'ProfileSekolahController@homepage');

    // ? url Informasi Akademik
    //ppdb
Route::get('/form-page/ppdb/{slug}', 'PpdbController@formPPDB');
Route::post('/daftar/ppdb/sd', 'PpdbController@pendaftaranSiswaSd');
Route::post('/daftar/ppdb/smp', 'PpdbController@pendaftaranSiswaSmp');
Route::get('/ppdb/pengumuman/{slug}', 'PpdbController@pagePengumuman');
Route::get('ppdb/{kelas}/download-data/{id}', 'PpdbController@downloadDataPPDB');

    //siswa 
Route::get('/info/data-siswa/{slug}', 'SiswaController@pageDataSiswa');

    //struktural
Route::get('/info/struktural/{slug}', 'StrukturalController@homepage');


    // ? Url Gallery Photo & Video
Route::get('/gallery-photo', 'GalleryController@homepage');
Route::get('/gallery-video', 'GalleryController@homepage');

    // ? url Artikel & Berita
Route::get('/artikel/{category}', 'NewsController@listArticle');
Route::get('/artikel/{category}/{slug}', 'NewsController@showArticle');


    // ? Dev Test
Route::get('/test', 'PpdbController@berhasil');


// TODO : URL untuk website Admin

    // ? url Dashboard
Route::get('/admin/siswa/get-data', 'SiswaController@countDataSiswa');
Route::get('/admin/ppdb/get-data', 'PpdbController@countDataPPDB');
Route::get('/panel-admin/dashboard', 'PagesController@dashboardPage');
    // ? url PPDB

        //* PPDB-SD
Route::get('/panel-admin/ppdb-sd', 'PpdbController@dashboardPpdb');
Route::get('/admin/ppdb-sd/status', 'PpdbController@statusPPDB');
Route::get('/admin/ppdb-sd/get-data', 'PpdbController@dataPpdbSd');
Route::get('/admin/ppdb-sd/get-pengumuman', 'PpdbController@beritaPengumuman');
Route::post('/admin/ppdb-sd/update-pengumuman', 'PpdbController@updatePengumuman');
Route::get('ppdb/{kelas}/download-data/{id}', 'PpdbController@downloadDataPPDB');
Route::post('/admin/ppdb-sd/change/{id}', 'PpdbController@changeStatusSd');
Route::post('/admin/ppdb-sd/delete/{id}','PpdbController@deleteDataPpdbSd');
Route::post('/admin/ppdb-sd/buka', 'PpdbController@changeStatusPpdb');
Route::post('/admin/ppdb-sd/tutup', 'PpdbController@changeStatusPpdb');

        //* PPDB-SMP
Route::get('/panel-admin/ppdb-smp', 'PpdbController@dashboardPpdb');
Route::get('/admin/ppdb-smp/status', 'PpdbController@statusPPDB');
Route::get('/admin/ppdb-smp/get-data', 'PpdbController@dataPpdbSmp');
Route::get('/admin/ppdb-smp/get-pengumuman', 'PpdbController@beritaPengumuman');
Route::post('/admin/ppdb-smp/update-pengumuman', 'PpdbController@updatePengumuman');
Route::get('ppdb/{kelas}/download-data/{id}', 'PpdbController@downloadDataPPDB');
Route::post('/admin/ppdb-smp/change/{id}', 'PpdbController@changeStatusSmp');
Route::post('/admin/ppdb-smp/delete/{id}','PpdbController@deleteDataPpdbSmp');
Route::post('/admin/ppdb-smp/buka', 'PpdbController@changeStatusPpdb');
Route::post('/admin/ppdb-smp/tutup', 'PpdbController@changeStatusPpdb');


    // ? url AccountController
Route::get('/panel-admin/login', 'PagesController@loginPage');
Route::get('/panel-admin/register', 'PagesController@registerPage');
Route::get('/panel-admin/edit-account', 'PagesController@editAccountPage');

Route::post('/admin/regis', 'AccountController@registerAdmin');
Route::post('/admin/login', 'AccountController@loginAdmin');
Route::post('/admin/edit-account', 'AccountController@editAccountAdmin');
Route::get('/admin/logout', 'AccountController@logoutAdmin');

    // ? url Gallery foto 
Route::get('/panel-admin/gallery-foto', 'GalleryController@index');
Route::get('/admin/foto/get-data', 'GalleryController@dataFoto');
Route::post('/admin/foto/upload-foto', 'GalleryController@uploadFoto');
Route::post('/admin/foto/delete-foto/{id}', 'GalleryController@deleteFoto');

    // ? url Gallery video
Route::get('/panel-admin/gallery-video', 'GalleryController@pageVideo');
Route::get('/admin/video/data-video', 'GalleryController@dataLink');
Route::post('/admin/video/add-link', 'GalleryController@addLink');
Route::get('/admin/video/select-link/{id}', 'GalleryController@selectLink');
Route::post('/admin/video/update-link/{id}', 'GalleryController@updateLink');
Route::post('/admin/video/delete-link/{id}', 'GalleryController@deleteLink');

    // ? url Berita
Route::get('/panel-admin/berita', 'NewsController@index');
Route::get('/admin/berita/get-data', 'NewsController@data');
Route::post('/admin/berita/add-berita','NewsController@addNews');
Route::get('/admin/berita/select-berita/{id}','NewsController@selectNews');
Route::post('/admin/berita/update-berita/{id}','NewsController@updateNews');
Route::post('/admin/berita/delete-berita/{id}', 'NewsController@deleteNews');

    // ? url Data Siswa
Route::get('/panel-admin/data-siswa-sd', 'SiswaController@index'); // Web Data Siswa SD
Route::get('/panel-admin/data-siswa-smp', 'SiswaController@index'); // Web Data Siswa SMP

Route::get('admin/data-siswa/{kelasId}', 'SiswaController@dataSiswa');
Route::post('/admin/data-siswa/add/{kelasId}', 'SiswaController@tambahData');
Route::get('admin/data-siswa/select/{id}', 'SiswaController@selectData');
Route::post('/admin/data-siswa/update/{id}', 'SiswaController@updateData');
Route::post('/admin/data-siswa/delete/{id}', 'SiswaController@deleteData');

    // ? url Profile Sekolah
Route::get('/panel-admin/profile-sd', 'ProfileSekolahController@index');
Route::get('/panel-admin/profile-smp', 'ProfileSekolahController@index');

Route::get('/admin/data-profile/get-data/{idProfile}', 'ProfileSekolahController@dataProfile');
Route::post('/admin/data-profile/edit/{idProfile}', 'ProfileSekolahController@updateProfile');

    //? url Struktural
Route::get('/panel-admin/struktural/{slug}', 'StrukturalController@index');
Route::get('admin/struktural/data/{idSekolah}', 'StrukturalController@dataStruktural');
Route::post('admin/struktural/add/{idSekolah}/{slug}', 'StrukturalController@addData');
Route::get('admin/struktural/select/{id}', 'StrukturalController@selectData');
Route::post('admin/struktural/update/{id}', 'StrukturalController@updateData');
Route::post('admin/struktural/delete/{id}', 'StrukturalController@deleteData');


