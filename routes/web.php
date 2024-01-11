<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Models\Siswa;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

// Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/', [LoginController::class, 'index'])->name('home');
Route::post('/verif', [LoginController::class, 'roleAction'])->name('verif');
Route::get('/adminlogin', [LoginController::class, 'adminLoginPage'])->name('login.admin');
Route::post('/adminlogin', [LoginController::class, 'adminLogin'])->name('adminLoginAction');
Route::get('/search', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/dashboard-siswa', [SiswaController::class, 'dashboard', 'totalPoint'])->name('dashboard.siswa');
Route::get('/result/siswa', [SiswaController::class, 'resultSiswa', 'totalPoint'])->name('dashboard');

// Route::get('/result', [AdminController::class, 'result'])->name('result');
// Route::get('/pelanggaran/{aksi}', [PelanggaranController::class, 'pelanggaran'])->name('pelanggaran');
// Route::post('/pelanggaran/store/aksi', [PelanggaranController::class, 'storeAksi'])->name('pelanggaran.store.aksi');
// Route::post('/pelanggaran/add/{aksi}', [PelanggaranController::class, 'addAksi'])->name('pelanggaran.add.aksi');
// Route::post('/pelanggaran/print', [PelanggaranController::class, 'print'])->name('pelanggaran.print');
// Route::post('/pelanggaran/remove/{aksi}', [PelanggaranController::class, 'removeAksi'])->name('pelanggaran.remove.aksi');

// access this route only for Admin and Teachers
// IF YOU FOUND THE BUG(FEATURE) YOU CAN REPORT THIS IN ISSUE GIRHUB PAGE

Route::middleware(['role', 'auth'])->group(function () {
    Route::get('/result', [AdminController::class, 'result'])->name('result');
    // Route::get('/result', [AdminController::class, 'result'])->name('result');
    Route::get('/pelanggaran/{aksi}', [PelanggaranController::class, 'pelanggaran'])->name('pelanggaran');
    Route::post('/pelanggaran/store/aksi', [PelanggaranController::class, 'storeAksi'])->name('pelanggaran.store.aksi');
    Route::post('/pelanggaran/add/{aksi}', [PelanggaranController::class, 'addAksi'])->name('pelanggaran.add.aksi');
    Route::post('/pelanggaran/print', [PelanggaranController::class, 'print'])->name('pelanggaran.print');
    Route::post('/pelanggaran/remove/{aksi}', [PelanggaranController::class, 'removeAksi'])->name('pelanggaran.remove.aksi');
    Route::get('/students', [SiswaController::class, 'adminSiswaPage'])->name('siswaAdmin');
    Route::get('/students/create', [SiswaController::class, 'adminSiswaAddPage'])->name('siswaAdminAdd');
    Route::post('/students', [SiswaController::class, 'adminSiswaAddAction'])->name('siswaAdminAction');
    Route::get('/students/{id}', [SiswaController::class, 'adminSiswaUpdatePage'])->name('siswaAdminUpdate');
    Route::post('/students/update', [SiswaController::class, 'adminSiswaUpdateAction'])->name('siswaAdminUpdateAction');
    Route::delete('/students/{id}', [SiswaController::class, 'adminSiswaDeleteAction'])->name('siswaAdminDeleteAction');
    Route::get('/listpelanggaran/{nis}', [PelanggaranController::class, 'listPelanggaranPage'])->name('listPelanggaran');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    // add guru BK
    Route::resources([
        'teachers' => GuruController::class,
    ]);
});
