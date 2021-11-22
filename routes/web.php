<?php

use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\FungsiAjaxController;
use App\Http\Controllers\KaryaMahasiswaController;
use App\Http\Controllers\KemampuanBahasaAsingController;
use App\Http\Controllers\KewirausahaanController;
use App\Http\Controllers\LoadDataController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\Master\MasterBidangController;
use App\Http\Controllers\Master\MasterBobotNilaiController;
use App\Http\Controllers\Master\MasterKategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\PenerimaHibahController;
use App\Http\Controllers\PengabdianMasyarakatController;
use App\Http\Controllers\PenghargaanKejuaraanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SeminarPelatihanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidasiRekamKegiatanController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login', [\Vizir\KeycloakWebGuard\Controllers\AuthController::class, 'login'])->name('keycloak.login');
Route::get('/callback', [\Vizir\KeycloakWebGuard\Controllers\AuthController::class, 'callback'])->name('keycloak.callback');
Route::post('/logout', [\Vizir\KeycloakWebGuard\Controllers\AuthController::class, 'logout'])->name('keycloak.logout');


Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::post('pe rmission/create',[MenuController::class,'createPermission'])->name('menus.permission');
    Route::get('load/dosen-pegawai',[LoadDataController::class,'loadDosenPegawai'])->name('load.dosen-pegawai');
    Route::get('load/dosen',[LoadDataController::class,'loadDosen'])->name('load.dosen');

    Route::resource('menus', MenuController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('user', UserController::class);
    Route::resource('validasi-rekam-kegiatan', ValidasiRekamKegiatanController
    ::class);

    // fungsi
    Route::get('load-bobot',[FungsiAjaxController::class,'load_bobot'])->name('fungsi.load-bobot');

    Route::resource('penghargaan-kejuaraan',PenghargaanKejuaraanController::class);
    Route::resource('seminar-pelatihan', SeminarPelatihanController::class);
    Route::resource('penerima-hibah', PenerimaHibahController::class);
    Route::resource('pengabdian-masyarakat', PengabdianMasyarakatController::class);
    Route::resource('organisasi', OrganisasiController::class);
    Route::resource('magang', MagangController::class);
    Route::resource('beasiswa', BeasiswaController::class);
    Route::resource('kemampuan-bahasa-asing', KemampuanBahasaAsingController::class);
    Route::resource('kewirausahaan', KewirausahaanController::class);
    Route::resource('karya-mahasiswa', KaryaMahasiswaController::class);

    // Master
    Route::resource('bobot-nilai', MasterBobotNilaiController::class);
    Route::resource('kategori', MasterKategoriController::class);
    Route::resource('bidang', MasterBidangController::class);

    // Cetak
    Route::resource('cetak', CetakController::class);
});
