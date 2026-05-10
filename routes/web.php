<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterKaryawanController;
use App\Http\Controllers\MasterKotaController;
use App\Http\Controllers\PengajuanPerdinController;
use App\Http\Controllers\PerdinkuController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get(
    '/',
    function(){
        return redirect()->route('login_page');
    }
);

Route::get(
    '/register',
    [RegisterController::class, 'register_page']
)->name('register_page');

Route::post(
    '/register_process',
    [RegisterController::class, 'register_process']
)->name('register_process');

Route::get(
    '/login', 
    [LoginController::class, 'login_page']
)->name('login_page');

Route::post(
    '/login_process',
    [LoginController::class, 'login_process']
)->name('login_process');

Route::get(
    '/home',
    [HomeController::class, 'index']
)->name('home')->middleware('LoginCheckMiddleware');

Route::get(
    '/logout',
    [LoginController::class, 'logout']
)->name('logout');

Route::get(
    '/perdinku',
    [PerdinkuController::class, 'perdinku_page']
)->name('perdinku_page')->middleware('LoginCheckMiddleware')->middleware('PegawaiRoleCheckMiddleware');

Route::get(
    '/tambah_perdin',
    [PerdinkuController::class, 'tambah_perdin']
)->name('tambah_perdin')->middleware('LoginCheckMiddleware')->middleware('PegawaiRoleCheckMiddleware');

Route::post(
    '/tambah_perdin_process',
    [PerdinkuController::class, 'tambah_perdin_process']
)->name('tambah_perdin_process')->middleware('LoginCheckMiddleware')->middleware('PegawaiRoleCheckMiddleware');

Route::get(
    '/pengajuan_perdin_baru',
    [PengajuanPerdinController::class, 'pengajuan_perdin_baru_page']
)->name('pengajuan_perdin_baru_page')->middleware('LoginCheckMiddleware')->middleware('SDMRoleCheckMiddleware');

Route::get(
    '/riwayat_pengajuan_perdin',
    [PengajuanPerdinController::class, 'riwayat_pengajuan_perdin_page']
)->name('riwayat_pengajuan_perdin_page')->middleware('LoginCheckMiddleware')->middleware('SDMRoleCheckMiddleware');

Route::get(
    '/pengajuan_perdin_baru/aksi/{id}',
    [PengajuanPerdinController::class, 'aksi_pengajuan_perdin']
)->name('aksi_pengajuan_perdin')->middleware('LoginCheckMiddleware')->middleware('SDMRoleCheckMiddleware');

Route::post(
    '/aksi_pengajuan_perdin_process',
    [PengajuanPerdinController::class, 'aksi_pengajuan_perdin_process']
)->name('aksi_pengajuan_perdin_process')->middleware('LoginCheckMiddleware')->middleware('SDMRoleCheckMiddleware');

Route::get(
    '/master_kota',
    [MasterKotaController::class, 'master_kota_page']
)->name('master_kota_page')->middleware('LoginCheckMiddleware')->middleware('AdminRoleCheckMiddleware');

Route::get(
    '/master_kota_tambah',
    [MasterKotaController::class, 'master_kota_tambah']
)->name('master_kota_tambah')->middleware('LoginCheckMiddleware')->middleware('AdminRoleCheckMiddleware');

Route::post(
    '/master_kota_tambah_process',
    [MasterKotaController::class, 'master_kota_tambah_process']
)->name('master_kota_tambah_process')->middleware('LoginCheckMiddleware')->middleware('AdminRoleCheckMiddleware');

Route::get(
    '/master_kota/edit/{id}',
    [MasterKotaController::class, 'master_kota_edit']
)->name('master_kota_edit')->middleware('LoginCheckMiddleware')->middleware('AdminRoleCheckMiddleware');

Route::post(
    '/master_kota_edit_process',
    [MasterKotaController::class, 'master_kota_edit_process']
)->name('master_kota_edit_process')->middleware('LoginCheckMiddleware')->middleware('AdminRoleCheckMiddleware');

Route::get(
    '/master_kota/hapus/{id}',
    [MasterKotaController::class, 'master_kota_hapus_process']
)->name('master_kota_hapus_process')->middleware('LoginCheckMiddleware')->middleware('AdminRoleCheckMiddleware');

Route::get(
    '/master_karyawan',
    [MasterKaryawanController::class, 'master_karyawan_page']
)->name('master_karyawan_page')->middleware('LoginCheckMiddleware')->middleware('AdminRoleCheckMiddleware');

Route::get(
    '/master_karyawan/edit/{id}',
    [MasterKaryawanController::class, 'master_karyawan_edit']
)->name('master_karyawan_edit')->middleware('LoginCheckMiddleware')->middleware('AdminRoleCheckMiddleware');

Route::post(
    '/master_karyawan_edit_process',
    [MasterKaryawanController::class, 'master_karyawan_edit_process']
)->name('master_karyawan_edit_process')->middleware('LoginCheckMiddleware')->middleware('AdminRoleCheckMiddleware');
