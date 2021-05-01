<?php
//Nim 2019102060 Dandy Rahmat Zain
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PrintController;
use App\Models\MahasiswaModel;
use App\Models\KegiatanwaModel;

//controler harus dipanggil dulu di atas
Route::get('/',[HomeController::class,'index']);

//Latihan Ambil Data Id Dari Url
Route::get('/mahasiswa/latihan_ambil_data/{id}',[MahasiswaController::class,'latihan_ambil_data']);

//Mahasiswa
//View Mahasiswa
Route::get('/mahasiswa',[MahasiswaController::class,'index'])->name('mahasiswa');
//Detail Mahasiswa
Route::get('/mahasiswa/detail/{id}',[MahasiswaController::class,'detail']);
//Add Mahasiswa
Route::get('/mahasiswa/add',[MahasiswaController::class,'add']);
Route::post('/mahasiswa/insert',[MahasiswaController::class,'insert']);
//Edit Mahasiswa
Route::get('/mahasiswa/edit/{id}',[MahasiswaController::class,'edit']);
Route::post('/mahasiswa/update/{id}',[MahasiswaController::class,'update']);
//Hapus Mahasiswa
Route::get('/mahasiswa/delete/{id}',[MahasiswaController::class,'delete']);
//Print Mahasiswa
Route::get('/mahasiswa/print',[MahasiswaController::class,'print']);

//Dosen
//View Dosen
Route::get('/dosen',[DosenController::class,'index'])->name('dosen');
//Detail Dosen
Route::get('/dosen/detail/{id_dosen}',[DosenController::class,'detail']);
//Add Dosen
Route::get('/dosen/add',[DosenController::class,'add']);
Route::post('/dosen/insert',[DosenController::class,'insert']);
//Edit Dosen
Route::get('/dosen/edit/{id_dosen}',[DosenController::class,'edit']);
Route::post('/dosen/update/{id_dosen}',[DosenController::class,'update']);
//Hapus Dosen
Route::get('/dosen/delete/{id_dosen}',[DosenController::class,'delete']);
//Print Dosen
Route::get('/dosen/print',[DosenController::class,'print']);

//Kegiatan
//View Kegiatan
Route::get('/kegiatan',[KegiatanController::class,'index'])->name('kegiatan');
//Detail kegiatan
Route::get('/kegiatan/detail/{id_kegiatan}',[KegiatanController::class,'detail']);
//Add kegiatan
Route::get('/kegiatan/add',[KegiatanController::class,'add']);
Route::post('/kegiatan/insert',[KegiatanController::class,'insert']);
//Edit kegiatan
Route::get('/kegiatan/edit/{id_kegiatan}',[KegiatanController::class,'edit']);
Route::post('/kegiatan/update/{id_kegiatan}',[KegiatanController::class,'update']);
//Hapus kegiatan
Route::get('/kegiatan/delete/{id_kegiatan}',[KegiatanController::class,'delete']);
//Print kegiatan
Route::get('/kegiatan/print',[KegiatanController::class,'print']);

Route::get('/about',[AboutController::class,'index']);
Route::get('/pengumuman',[PengumumanController::class,'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
