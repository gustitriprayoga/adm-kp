<?php

use App\Models\Mahasiswa;
use GuzzleHttp\Middleware;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BimbinganController;
use App\Http\Controllers\LaporankpController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\PengajuankpController;
use App\Http\Controllers\SeminarKpController;
use App\Models\Laporankp;
use App\Models\Pengajuankp;

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

//login
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('/login', function () {return view('dashboard');})->name('sign-up');
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/registrasi', [RegistrasiController::class, 'create']);
Route::post('/registrasi', [RegistrasiController::class, 'store'])->name('registrasi');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/session', [LoginController::class, 'post'])->name('loginn');


Route::group(['middleware'=>['auth','checkRole:Admin,Staf,Ketua Prodi']], function () {
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

});

Route::group(['middleware'=>['auth','checkRole:Mahasiswa']], function () {
    Route::get('/dashboardd', [MahasiswaController::class, 'pengajuan']);
});

Route::group(['middleware'=>['auth','checkRole:Dospem']], function () {
    Route::get('/dashboarddd', [LogbookController::class, 'logbook'])->name('logbook');
});

Route::group(['middleware'=>['auth']], function(){
    //admin
    Route::get('/datamahasiswa', [AdminController::class, 'datamahasiswa'])->name('datamhs');
    Route::get('/akun', [PenggunaController::class, 'index'])->name('akun');
    Route::get('/datadosen', [AdminController::class, 'datadosen'])->name('datadosen');
    Route::get('/tambahmhs', [AdminController::class, 'createmhs'])->name('tambahmhs');
    Route::get('/tambahdosen', [AdminController::class, 'createdosen'])->name('tambahdosen');
    Route::get('/pengajuan/status/{id}', [PengajuankpController::class, 'status'])->name('pengajuan.status');
    Route::get('/datadosen/delete/{id}', [PenggunaController::class, 'delete'])->name('datadosen.delete');
    Route::get('/datadosen/edit/{id}', [PenggunaController::class, 'editdatadosen'])->name('datadosen.edit');
    Route::post('/datadosen/update/{id}', [PenggunaController::class, 'updatedatadosen'])->name('datadosen.update');
    Route::get('/pengajuan/status_tolak/{id}', [PengajuankpController::class, 'status_tolak'])->name('pengajuan.status_tolak');
    Route::get('/user/delete/{id}', [PenggunaController::class, 'deleteuser'])->name('user.delete');

    //edit data mahasiswa
    Route::get('/datamhs/delete/{id}', [AdminController::class, 'delete'])->name('datamhs.delete');
    Route::get('/datamh/edit/{id}', [AdminController::class, 'editdatamhs'])->name('datamhs.edit');
    Route::post('/datamhs/update/{id}', [AdminController::class, 'updatedatamhs'])->name('datamhs.update');
    //pilih dosen pembimbing
    Route::post('/bimbinganstore/{id}', [BimbinganController::class, 'bimbinganstore'])->name('bimbingan.store');
    Route::post('/tambahuserdosen/store', [PenggunaController::class, 'store'])->name('tambahuserdosen.store');
    Route::get('/tambahuserdosen', [PenggunaController::class, 'userdosen'])->name('tambahuserdosen');
    // edit profile
    Route::post('/updateprofile/post/{id}', [PenggunaController::class, 'updateprofile'])->name('updateprofile');
    Route::post('/updatepassword/post/{id}', [PenggunaController::class, 'update_password'])->name('update_password');
    // Mahasiswa
    Route::get('/pengajuan/cetak/{id}', [PengajuankpController::class, 'cetak'])->name('pengajuan.cetak');
    Route::get('/pengajuan/store', [PengajuankpController::class, 'store'])->name('pengajuan.store');
    Route::get('/pengajuan', [MahasiswaController::class, 'pengajuan'])->name('pengajuan');
    Route::get('/pengajuankp', [MahasiswaController::class, 'pengajuankp'])->name('pengajuankp');
    Route::get('/laporankp/uploadlaporan', [MahasiswaController::class, 'uploadlaporan'])->name('laporan.upload');
    //laporankp bimbingan ketua prodi
    Route::get('/kaprodi/laporankp/index', [LaporankpController::class, 'laporann'])->name('ka.laporan.index');
    Route::get('/kaprodi/laporankp/detail/{id}', [LaporankpController::class, 'detaill'])->name('ka.laporan.detail');
    //laporankp
    Route::get('/laporankp/index', [LaporankpController::class, 'laporan'])->name('laporan.index');
    Route::get('/laporankp/detail/{id}', [LaporankpController::class, 'detail'])->name('laporan.detail');
    Route::post('/store', [LaporankpController::class, 'store'])->name('laporan.store');
    //kirim catatan laporan
    Route::post('/catatan/{id}', [LaporankpController::class, 'catatan'])->name('laporan.catatan');
    //profil mhs
    Route::get('/profilmhs', [MahasiswaController::class, 'profil'])->name('profilmhs');
    Route::post('/editprofil/{id}', [MahasiswaController::class, 'edit'])->name('edit.profil');
    //logbook
    Route::get('/buatlogbook', [LogbookController::class, 'buatlogbook'])->name('buatlogbook');
    Route::post('/buatlogbook/store', [LogbookController::class, 'store'])->name('buatlogbook.store');
    Route::get('/buatlogbook/paraf{id}', [LogbookController::class, 'paraf'])->name('buatlogbook.paraf');
    Route::get('/logbook', [LogbookController::class, 'logbook'])->name('logbook');
    Route::get('/logbookmhs', [LogbookController::class, 'logbookk'])->name('logbookmhs');
    Route::get('/logbook/detail/{id}', [LogbookController::class, 'detail'])->name('logbook.detail');
    Route::get('/logbook/detaill/{id}', [LogbookController::class, 'detaill'])->name('logbook.doskp');
    //upload
    Route::post('/suratkp/{id}', [UploadController::class, 'store'])->name('suratkp.store');
    Route::post('/suratbalasan/{id}', [UploadController::class, 'store_balasan'])->name('suratbalasan.store');
    //nilai mahasiswa bimbingan ketua prodi
    Route::get('/kaprodi/nilaimhs', [NilaiController::class, 'indexx'])->name('ka.nilaimhs');
    Route::get('/kaprodi/detail/{id}', [NilaiController::class, 'detaill'])->name('ka.nilai.detail');
    //nilai
    Route::get('/nilaimhs', [NilaiController::class, 'index'])->name('nilaimhs');
    Route::get('/detail/{id}', [NilaiController::class, 'detail'])->name('nilai.detail');
    Route::post('/detail/store/{id}', [NilaiController::class, 'store'])->name('nilai.store');
    //chat
    Route::post('/chat/{id}', [LogbookController::class, 'chat'])->name('chat.post');

    //seminar kp
    Route::get('/seminarkp', [SeminarKpController::class, 'index'])->name('seminar');
    Route::get('/seminarkp/create', [SeminarKpController::class, 'create'])->name('seminar.create');
    Route::post('/seminarkp/store', [SeminarKpController::class, 'store'])->name('seminar.store');
    Route::get('/seminarkp/edit/{id}', [SeminarKpController::class, 'edit'])->name('seminar.edit');
    Route::post('/seminarkp/update/{id}', [SeminarKpController::class, 'update'])->name('seminar.update');
    Route::get('/seminar/verifikasi/{id}', [SeminarKpController::class, 'verifikasi'])->name('seminar.verifikasi');
    Route::put('/seminar/verifikasi/{id}', [SeminarKpController::class, 'verifikasiUpdate'])->name('seminar.verifikasi.update');
    Route::get('/seminar/acc/{id}',[SeminarKpController::class, 'acc'])->name('seminar.acc');
    Route::put('/seminar/acc/{id}',[SeminarKpController::class, 'accUpdate'])->name('seminar.acc.update');
    Route::delete('/seminarkp/delete/{id}', [SeminarKpController::class, 'delete'])->name('seminar.delete');
});













