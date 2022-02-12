<?php

use Illuminate\Support\Facades\Route;

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

Route::get('master-jemaat/ulang-tahun', 'MasterJemaatController@UlangTahun')->middleware('auth');
Route::get('master-jemaat/cari-ulang-tahun', 'MasterJemaatController@CariUltah')->middleware('auth');
Route::get('master-jemaat/search-ulang-tahun', 'MasterJemaatController@ListUltah');
Route::post('master-jemaat/search-ulang-tahun', 'MasterJemaatController@ListUltah');

Route::get('master-jemaat/pernikahan', 'MasterJemaatController@Pernikahan')->middleware('auth');
Route::get('master-jemaat/cari-pernikahan', 'MasterJemaatController@CariPernikahan')->middleware('auth');
Route::get('master-jemaat/search-pernikahan', 'MasterJemaatController@ListPernikahan');
Route::post('master-jemaat/search-pernikahan', 'MasterJemaatController@ListPernikahan');

Route::get('master-jemaat/meninggal', 'MasterJemaatController@Meninggal')->middleware('auth');
Route::get('master-jemaat/kepala-keluarga', 'MasterJemaatController@KepalaKeluarga')->middleware('auth');
Route::get('master-jemaat/detail-kepala-keluarga/{no_kk}', 'MasterJemaatController@DetailKepalaKeluarga')->middleware('auth');
Route::get('master-jemaat/detail-jemaat', 'MasterJemaatController@DetailJemaat')->middleware('auth');
Route::get('master-jemaat/detail-informasi-jemaat/{id}', 'MasterJemaatController@DetailInformasi')->middleware('auth');

Route::group(['middleware' => ['role:superadministrator']], function () {

Route::get('jemaat/index', 'JemaatController@index');
Route::get('jemaat/form-jemaat', 'JemaatController@Tambah');
Route::get('jemaat/form-jemaat/{id}', 'JemaatController@Edit');
Route::post('/simpan-jemaat', 'JemaatController@Simpan');
Route::post('/update-jemaat', 'JemaatController@Update');
Route::post('remove-jemaat', 'JemaatController@destroy');

Route::get('pekerjaan/tambah-pekerjaan', 'PekerjaanController@TambahPekerjaan');
Route::post('/simpan-pekerjaan', 'PekerjaanController@SimpanPekerjaan');
Route::get('pekerjaan/edit-pekerjaan/{id}', 'PekerjaanController@EditPekerjaan');
Route::get('pekerjaan/daftar-pekerjaan', 'PekerjaanController@DaftarPekerjaan');
Route::post('/update-pekerjaan', 'PekerjaanController@UpdatePekerjaan');
Route::get('pekerjaan/hapus-pekerjaan/{id}', 'PekerjaanController@HapusPekerjaan');
Route::post('delete-pekerjaan', 'PekerjaanController@DeletePekerjaan');
Route::get('pekerjaan/cari-pekerjaan', 'PekerjaanController@CariPekerjaan');
Route::get('pekerjaan/search-pekerjaan', 'PekerjaanController@ListPekerjaan');
Route::post('pekerjaan/search-pekerjaan', 'PekerjaanController@ListPekerjaan');

Route::get('gereja/index', 'GerejaController@index');
Route::post('update-gereja', 'GerejaController@edit');
Route::post('simpan-gereja', 'GerejaController@store');
Route::post('remove-gereja', 'GerejaController@destroy');



Route::get('pendidikan/index', 'PendidikanController@index');
Route::get('pendidikan/form', 'PendidikanController@create');
Route::post('simpan-pendidikan', 'PendidikanController@store');
Route::get('pendidikan/form/{id}', 'PendidikanController@edit');
Route::post('update-pendidikan', 'PendidikanController@update');
Route::post('remove-pendidikan', 'PendidikanController@destroy');



Route::get('babtis/tambah-babtis', 'BabtisController@TambahBabtis');
Route::get('babtis/daftar-babtis', 'BabtisController@DaftarBabtis');
Route::post('/simpan-babtis', 'BabtisController@SimpanBabtis');
Route::get('babtis/edit-babtis/{id}', 'BabtisController@EditBabtis');
Route::post('/update-babtis', 'BabtisController@UpdateBabtis');
Route::get('babtis/hapus-babtis/{id}', 'BabtisController@HapusBabtis');
Route::post('delete-babtis', 'BabtisController@DeleteBabtis');
Route::get('babtis/cari-babtis', 'BabtisController@CariBabtis');
Route::get('babtis/search-babtis', 'BabtisController@ListBabtis');
Route::post('babtis/search-babtis', 'BabtisController@ListBabtis');

Route::get('pernikahan/tambah-pernikahan', 'PernikahanController@TambahPernikahan');
Route::post('pernikahan/tambah-pernikahan', 'PernikahanController@SimpanPernikahan');
Route::get('pernikahan/daftar-pernikahan', 'PernikahanController@DaftarPernikahan');
Route::post('/simpan-pernikahan', 'PernikahanController@SimpanPernikahan');
Route::get('pernikahan/edit-pernikahan/{id}', 'PernikahanController@EditPernikahan');
Route::post('/update-pernikahan', 'PernikahanController@UpdatePernikahan');
Route::get('pernikahan/hapus-pernikahan/{id}', 'PernikahanController@HapusPernikahan');
Route::post('delete-pernikahan', 'PernikahanController@DeletePernikahan');
Route::get('pernikahan/cari-pernikahan', 'PernikahanController@CariPernikahan');
Route::get('pernikahan/search-pernikahan', 'PernikahanController@ListPernikahan');
Route::post('pernikahan/search-pernikahan', 'PernikahanController@ListPernikahan');

Route::get('usaha/tambah-usaha', 'usahaController@TambahUsaha');
Route::post('usaha/tambah-usaha', 'usahaController@TSimpanUsaha');
Route::get('usaha/daftar-usaha', 'usahaController@DaftarUsaha');
Route::post('/simpan-usaha', 'usahaController@SimpanUsaha');
Route::get('usaha/edit-usaha/{id}', 'usahaController@EditUsaha');
Route::post('/update-usaha', 'usahaController@UpdateUsaha');
Route::get('usaha/hapus-usaha/{id}', 'usahaController@HapusUsaha');
Route::post('delete-usaha', 'usahaController@DeleteUsaha');
Route::get('usaha/cari-usaha', 'UsahaController@CariUsaha');
Route::get('usaha/search-usaha', 'UsahaController@ListUsaha');
Route::post('usaha/search-usaha', 'UsahaController@ListUsaha');




Route::get('meninggal/tambah-meninggal', 'MeninggalController@TambahMeninggal');
Route::post('meninggal/tambah-meninggal', 'MeninggalController@TSimpanMeninggal');
Route::get('meninggal/daftar-meninggal', 'MeninggalController@DaftarMeninggal');
Route::post('/simpan-meninggal', 'MeninggalController@SimpanMeninggal');
Route::get('meninggal/edit-meninggal/{id}', 'MeninggalController@EditMeninggal');
Route::post('/update-meninggal', 'MeninggalController@UpdateMeninggal');
Route::get('meninggal/hapus-meninggal/{id}', 'MeninggalController@HapusMeninggal');
Route::post('delete-meninggal', 'MeninggalController@DeleteMeninggal');
Route::get('meninggal/cari-meninggal', 'MeninggalController@CariMeninggal');
Route::get('meninggal/search-meninggal', 'MeninggalController@ListMeninggal');
Route::post('meninggal/search-meninggal', 'MeninggalController@ListMeninggal');

Route::get('atestasi/tambah-atestasi', 'AtestasiController@TambahAtestasi');
Route::post('atestasi/tambah-atestasi', 'AtestasiController@TSimpanAtestasi');
Route::get('atestasi/daftar-atestasi', 'AtestasiController@DaftarAtestasi');
Route::post('/simpan-atestasi', 'AtestasiController@SimpanAtestasi');
Route::get('atestasi/edit-atestasi/{id}', 'AtestasiController@EditAtestasi');
Route::post('/update-atestasi', 'AtestasiController@UpdateAtestasi');
Route::get('atestasi/hapus-atestasi/{id}', 'AtestasiController@HapusAtestasi');
Route::post('delete-atestasi', 'AtestasiController@DeleteAtestasi');
Route::get('atestasi/cari-atestasi', 'AtestasiController@CariAtestasi');
Route::get('atestasi/search-atestasi', 'AtestasiController@ListAtestasi');
Route::post('atestasi/search-atestasi', 'AtestasiController@ListAtestasi');

Route::get('perjamuan-kudus/tambah-perjamuan-kudus', 'PerjamuanKudusController@TambahPerjamuanKudus');
Route::post('perjamuan-kudus/tambah-perjamuan-kudus', 'PerjamuanKudusController@TSimpanPerjamuanKudus');
Route::get('perjamuan-kudus/daftar-perjamuan-kudus', 'PerjamuanKudusController@DaftarPerjamuanKudus');
Route::post('/simpan-perjamuan-kudus', 'PerjamuanKudusController@SimpanPerjamuanKudus');
Route::get('perjamuan-kudus/edit-perjamuan-kudus/{id}', 'PerjamuanKudusController@EditPerjamuanKudus');
Route::post('/update-perjamuan-kudus', 'PerjamuanKudusController@UpdatePerjamuanKudus');
Route::get('perjamuan-kudus/hapus-perjamuan-kudus/{id}', 'PerjamuanKudusController@HapusPerjamuanKudus');
Route::post('delete-perjamuan-kudus', 'PerjamuanKudusController@DeletePerjamuanKudus');
Route::get('perjamuan-kudus/cari-perjamuan-kudus', 'PerjamuanKudusController@CariPerjamuanKudus');
Route::get('perjamuan-kudus/search-perjamuan-kudus', 'PerjamuanKudusController@ListPerjamuanKudus');
Route::post('perjamuan-kudus/search-perjamuan-kudus', 'PerjamuanKudusController@ListPerjamuanKudus');

});
