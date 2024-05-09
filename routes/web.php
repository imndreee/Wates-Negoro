<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelayananDesaController;

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

Route::get('/', 'HomeController@index')->name('home.index');

Route::get('/laporan-apbdes', 'AnggaranRealisasiController@laporan_apbdes')->name('laporan-apbdes');
Route::get('/layanan-surat', 'SuratController@layanan_surat')->name('layanan-surat');
Route::get('/pemerintahan-desa', 'PemerintahanDesaController@pemerintahan_desa')->name('pemerintahan-desa');
Route::get('/pemerintahan-desa/{pemerintahan_desa}', function () {
    return abort(404);
});
Route::get('/pemerintahan-desa/{pemerintahan_desa}/{slug}', 'PemerintahanDesaController@show')->name('pemerintahan-desa.show');
Route::get('/berita', 'BeritaController@berita')->name('berita');
Route::get('/berita/{berita}/{slug}', 'BeritaController@show')->name('berita.show');
Route::get('/berita/{berita}', function () {
    return abort(404);
});
Route::get('/gallery', 'GalleryController@gallery')->name('gallery');
Route::get('/buat-surat/{id}/{slug}', 'CetakSuratController@create')->name('buat-surat');
Route::get('/panduan', 'HomeController@panduan')->name('panduan');
Route::get('/statistik-penduduk', 'GrafikController@index')->name('statistik-penduduk');
Route::get('/statistik-penduduk/show', 'GrafikController@show')->name('statistik-penduduk.show');
Route::get('/anggaran-realisasi-cart', 'AnggaranRealisasiController@cart')->name('anggaran-realisasi.cart');
Route::post('/cetak-surat/{id}/{slug}', 'CetakSuratController@store')->name('cetak-surat.store');

// pelayanan
Route::get('/pelayanan', 'PelayananDesaController@index')->name('pelayanan.index');
Route::post('/pelayanan/kirim-permintaan', 'PelayananDesaController@kirimPermintaan')->name('pelayanan.kirim-permintaan');

Route::get('/ktp', 'PelayananDesaController@ktpIndex')->name('pelayanan.ktpIndex');
Route::post('/ktp/kirim-permintaan', 'PelayananDesaController@ktpKirim')->name('pelayanan.kirim-ktp');

Route::get('/kk', 'PelayananDesaController@kkIndex')->name('pelayanan.kkIndex');
Route::post('/kk/kirim-permintaan', 'PelayananDesaController@kkKirim')->name('pelayanan.kirim-kk');

Route::get('/waris', 'PelayananDesaController@warisIndex')->name('pelayanan.warisIndex');
Route::post('/waris/kirim-permintaan', 'PelayananDesaController@warisKirim')->name('pelayanan.kirim-waris');

Route::get('/skck', 'PelayananDesaController@skckIndex')->name('pelayanan.skckIndex');
Route::post('/skck/kirim-permintaan', 'PelayananDesaController@skckKirim')->name('pelayanan.kirim-skck');

Route::get('/nikah', 'PelayananDesaController@nikahIndex')->name('pelayanan.nikahIndex');
Route::post('/nikah/kirim-permintaan', 'PelayananDesaController@nikahKirim')->name('pelayanan.kirim-nikah');

Route::get('/kematian', 'PelayananDesaController@kematianIndex')->name('pelayanan.kematianIndex');
Route::post('/kematian/kirim-permintaan', 'PelayananDesaController@kematianKirim')->name('pelayanan.kirim-kematian');

Route::get('/sktm', 'PelayananDesaController@sktmIndex')->name('pelayanan.sktmIndex');
Route::post('/sktm/kirim-permintaan', 'PelayananDesaController@sktmKirim')->name('pelayanan.kirim-sktm');

Route::get('/pindah', 'PelayananDesaController@pindahIndex')->name('pelayanan.pindahIndex');
Route::post('/pindah/kirim-permintaan', 'PelayananDesaController@pindahKirim')->name('pelayanan.kirim-pindah');

Route::get('/domisili', 'PelayananDesaController@domisiliIndex')->name('pelayanan.domisiliIndex');
Route::post('/domisili/kirim-permintaan', 'PelayananDesaController@domisiliKirim')->name('pelayanan.kirim-domisili');


Route::group(['middleware' => ['web', 'guest']], function () {
    Route::get('/admin', 'AuthController@index')->name('masuk');
    Route::post('/admin', 'AuthController@masuk');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::post('/keluar', 'AuthController@keluar')->name('keluar');
    Route::get('/pengaturan', 'UserController@pengaturan')->name('pengaturan');
    Route::get('/profil', 'UserController@profil')->name('profil');
    Route::patch('/update-pengaturan/{user}', 'UserController@updatePengaturan')->name('update-pengaturan');
    Route::patch('/update-profil/{user}', 'UserController@updateProfil')->name('update-profil');

    Route::get('/profil-desa', 'DesaController@index')->name('profil-desa');
    Route::patch('/update-desa/{desa}', 'DesaController@update')->name('update-desa');

    // Route::get('/tambah-surat', 'SuratController@create')->name('surat.create');
    // Route::resource('/cetakSurat', 'CetakSuratController')->except('create', 'store', 'index');
    // Route::resource('/surat', 'SuratController')->except('create');

    Route::get('/kelola-pemerintahan-desa', 'PemerintahanDesaController@index')->name('pemerintahan-desa.index');
    Route::get('/tambah-pemerintahan-desa', 'PemerintahanDesaController@create')->name('pemerintahan-desa.create');
    Route::get('/edit-pemerintahan-desa/{pemerintahan_desa}', 'PemerintahanDesaController@edit')->name('pemerintahan-desa.edit');
    Route::resource('/pemerintahan-desa', 'PemerintahanDesaController')->except('create', 'show', 'index', 'edit');

    Route::get('/kelola-berita', 'BeritaController@index')->name('berita.index');
    Route::get('/tambah-berita', 'BeritaController@create')->name('berita.create');
    Route::get('/edit-berita/{berita}', 'BeritaController@edit')->name('berita.edit');
    Route::resource('/berita', 'BeritaController')->except('create', 'show', 'index', 'edit');

    Route::resource('/isiSurat', 'IsiSuratController')->except('index', 'create', 'edit', 'show');

    Route::post('/gallery/store', 'GalleryController@storeGallery')->name('gallery.storeGallery');
    Route::get('/kelola-gallery', 'GalleryController@index')->name('gallery.index');
    Route::resource('/gallery', 'GalleryController')->except('index', 'show', 'edit', 'update', 'create');

    Route::get('/tambah-slider', 'GalleryController@create')->name('slider.create');
    Route::get('/slider', 'GalleryController@indexSlider')->name('slider.index');

    Route::post('/video', 'VideoController@store')->name('video.store');
    Route::patch('/video/update', 'VideoController@update')->name('video.update');

    Route::get('/surat-harian', 'HomeController@suratHarian')->name('surat-harian');
    Route::get('/surat-bulanan', 'HomeController@suratBulanan')->name('surat-bulanan');
    Route::get('/surat-tahunan', 'HomeController@suratTahunan')->name('surat-tahunan');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

    Route::get('/tambah-penduduk', 'PendudukController@create')->name('penduduk.create');
    Route::get('/penduduk/{penduduk}', function () {
        return abort(404);
    });
    Route::resource('penduduk', 'PendudukController')->except('create', 'show');

    Route::get('/kelompok-jenis-anggaran/{kelompokJenisAnggaran}', 'AnggaranRealisasiController@kelompokJenisAnggaran');
    Route::get('/detail-jenis-anggaran/{id}', 'AnggaranRealisasiController@show')->name('detail-jenis-anggaran.show');
    Route::get('/tambah-anggaran-realisasi', 'AnggaranRealisasiController@create')->name('anggaran-realisasi.create');
    Route::get('/anggaran-realisasi/{anggaran_realisasi}', function () {
        return abort(404);
    });
    Route::resource('anggaran-realisasi', 'AnggaranRealisasiController')->except('create', 'show');

    Route::get('/tambah-dusun', 'DusunController@create')->name('dusun.create');
    Route::resource('dusun', 'DusunController')->except('create', 'show');
    Route::resource('detailDusun', 'DetailDusunController')->except('create', 'edit');

    Route::get('/chart-surat/{id}', 'SuratController@chartSurat')->name('chart-surat');

    Route::get('/export', 'ExportController@export')->name('export');
    Route::get('/printLaporan/{tahun}','PrintLaporanController@printPDF')->name('printLaporan');

    Route::get('/pelayanan', [PelayananController::class, 'index'])->name('pelayanan.index');
    Route::get('/pelayanan/popup', [PelayananController::class, 'showPopup'])->name('pelayanan.popup');


    //adminlayanan
    // Route::get('/admin/ktp', 'AdminKtpController@index')->name('kelola-ktp');

});

// Route::get('/pelayanan', [PelayananDesaController::class, 'index'])->name('pelayanan.index');
// Route::post('/pelayanan/kirim-permintaan', [PelayananDesaController::class, 'kirimPermintaan'])->name('pelayanan.kirim-permintaan');

Route::fallback(function () {
    abort(404);
});
