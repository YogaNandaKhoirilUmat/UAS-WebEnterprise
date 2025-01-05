<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AuthController;

use App\Models\Proyek;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [HomeController::class, 'home'])->middleware('auth');
Route::get('/projects', [ProyekController::class, 'viewProjects']);

Route::get('/projects/add', [ProyekController::class, 'ViewAddProject']);

Route::post('/projects/add', [ProyekController::class, 'addProject']);

Route::delete('/projects/delete/{id}', [ProyekController::class, 'deleteProject']);

Route::get('/projects/edit/{id}', [ProyekController::class, 'ViewEditProject']);

Route::put('/projects/edit/{id}', [ProyekController::class, 'updateProject']);

Route::get('/projects/laporan', [ProyekController::class, 'ViewLaporanProject']);

Route::get('/projects/laporan/print', [ProyekController::class, 'printproyek']);



Route::get('/rekapitulasi', [RekapController::class, 'ViewRekap']);

Route::get('/rekapitulasi/add', [RekapController::class, 'ViewAddRekap']);

Route::post('/rekapitulasi/add', [RekapController::class, 'AddRekap']);

Route::delete('/rekapitulasi/delete/{id_rekap}', [RekapController::class, 'DeleteRekap']);

Route::get('/rekapitulasi/edit/{id_rekap}', [RekapController::class, 'ViewEditRekap']);

Route::put('/rekapitulasi/edit/{id_rekap}', [RekapController::class, 'UpdateRekap']);

Route::get('/rekapitulasi/print', [RekapController::class, 'printrekap']);



Route::get(('/pegawai'),[PegawaiController::class, 'ViewPegawai']);

Route::get('/pegawai/add', [PegawaiController::class, 'ViewAddPegawai']);

Route::post('/pegawai/add', [PegawaiController::class, 'AddPegawai']);

Route::delete('/pegawai/delete/{id_pegawai}', [PegawaiController::class, 'DeletePegawai']);

Route::get('/pegawai/edit/{id_pegawai}', [PegawaiController::class, 'ViewEditPegawai']);

Route::put('/pegawai/edit/{id_pegawai}', [PegawaiController::class, 'UpdatePegawai']);

Route::get('/pegawai/print', [PegawaiController::class, 'printpegawai']);


Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);


Route::middleware(['auth', 'user-access:user'])->prefix('user')->group(function () {
    Route::get('/home', [HomeController::class, 'home']);

    Route::get('/projects', [ProyekController::class, 'viewProjects']);

    Route::get('/projects/add', [ProyekController::class, 'ViewAddProject']);

    Route::post('/projects/add', [ProyekController::class, 'addProject']);

    Route::delete('/projects/delete/{id}', [ProyekController::class, 'deleteProject']);

    Route::get('/projects/edit/{id}', [ProyekController::class, 'ViewEditProject']);

    Route::put('/projects/edit/{id}', [ProyekController::class, 'updateProject']);

    Route::get('/projects/laporan', [ProyekController::class, 'ViewLaporanProject']);

    Route::get('/projects/laporan/print', [ProyekController::class, 'printproyek']);

    Route::get('/rekapitulasi', [RekapController::class, 'ViewRekap']);

    Route::get('/rekapitulasi/add', [RekapController::class, 'ViewAddRekap']);

    Route::post('/rekapitulasi/add', [RekapController::class, 'AddRekap']);

    Route::delete('/rekapitulasi/delete/{id_rekap}', [RekapController::class, 'DeleteRekap']);

    Route::get('/rekapitulasi/edit/{id_rekap}', [RekapController::class, 'ViewEditRekap']);

    Route::put('/rekapitulasi/edit/{id_rekap}', [RekapController::class, 'UpdateRekap']);

    Route::get('/rekapitulasi/print', [RekapController::class, 'printrekap']);

    Route::get(('/pegawai'),[PegawaiController::class, 'ViewPegawai']);

    Route::get('/pegawai/add', [PegawaiController::class, 'ViewAddPegawai']);

    Route::post('/pegawai/add', [PegawaiController::class, 'AddPegawai']);

    Route::delete('/pegawai/delete/{id_pegawai}', [PegawaiController::class, 'DeletePegawai']);

    Route::get('/pegawai/edit/{id_pegawai}', [PegawaiController::class, 'ViewEditPegawai']);

    Route::put('/pegawai/edit/{id_pegawai}', [PegawaiController::class, 'UpdatePegawai']);

    Route::get('/pegawai/print', [PegawaiController::class, 'printpegawai']);

});

Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->group(function () {
    Route::get('/home', [HomeController::class, 'home']);
    Route::get('/projects', [ProyekController::class, 'viewProjects']);

    Route::get('/projects/add', [ProyekController::class, 'ViewAddProject']);

    Route::post('/projects/add', [ProyekController::class, 'addProject']);

    Route::delete('/projects/delete/{id}', [ProyekController::class, 'deleteProject']);

    Route::get('/projects/edit/{id}', [ProyekController::class, 'ViewEditProject']);

    Route::put('/projects/edit/{id}', [ProyekController::class, 'updateProject']);

    Route::get('/projects/laporan', [ProyekController::class, 'ViewLaporanProject']);

    Route::get('/projects/laporan/print', [ProyekController::class, 'printproyek']);

    Route::get('/rekapitulasi', [RekapController::class, 'ViewRekap']);

    Route::get('/rekapitulasi/add', [RekapController::class, 'ViewAddRekap']);

    Route::post('/rekapitulasi/add', [RekapController::class, 'AddRekap']);

    Route::delete('/rekapitulasi/delete/{id_rekap}', [RekapController::class, 'DeleteRekap']);

    Route::get('/rekapitulasi/edit/{id_rekap}', [RekapController::class, 'ViewEditRekap']);

    Route::put('/rekapitulasi/edit/{id_rekap}', [RekapController::class, 'UpdateRekap']);

    Route::get('/rekapitulasi/print', [RekapController::class, 'printrekap']);

    Route::get('/pegawai', [PegawaiController::class, 'ViewPegawai']);

    Route::get('/pegawai/add', [PegawaiController::class, 'ViewAddPegawai']);

    Route::post('/pegawai/add', [PegawaiController::class, 'AddPegawai']);

    Route::delete('/pegawai/delete/{id_pegawai}', [PegawaiController::class, 'DeletePegawai']);

    Route::get('/pegawai/edit/{id_pegawai}', [PegawaiController::class, 'ViewEditPegawai']);

    Route::put('/pegawai/edit/{id_pegawai}', [PegawaiController::class, 'UpdatePegawai']);

    Route::get('/pegawai/print', [PegawaiController::class, 'printpegawai']);

});
