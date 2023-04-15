<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KhatamanController;
use App\Http\Controllers\KonsumsiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SholatiedController;
use App\Http\Controllers\Tadarus\TadarusController;
use App\Http\Controllers\TakbiranController;
use App\Http\Controllers\TarawihController;
use App\Http\Controllers\Tpa\JadwalAjarController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\ZakatController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/index',    fn() => view('index'));
Route::get('/login',    fn() => view('login'));

Route::get('/tpa',      fn() => view('tpa'));
Route::get('/konsumsi', fn() => view('konsumsi'));
Route::get('/tarawih',  fn() => view('tarawih'));
Route::get('/tadarus',  fn() => view('tadarus'));
Route::get('/khataman', fn() => view('khataman'));
Route::get('/zakat',    fn() => view('zakat'));
Route::get('/takbiran', fn() => view('takbiran'));
Route::get('/ied',      fn() => view('ied'));

// LOGIN GOOGLE
Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);
Route::post('/logout', [AuthController::class,'destroy'])->name('logout');

Route::prefix('admin')->group(function () {
    
    Route::get('/', function () { 
        return view('admin.dashboard.index'); 
    })->name('dashboard');

    // ROUTE DASHBOARD
    Route::get('/dashtpa',[DashboardController::class,'tpa']);
    Route::get('/dashkonsumsi',[DashboardController::class,'konsumsi']);
    Route::get('/dashtarawih',[DashboardController::class,'tarawih']);
    Route::get('/dashtadarus',[DashboardController::class,'tadarus']);
    Route::get('/getTadarus',[DashboardController::class,'getTadarus'])->name('gettadarus');
       
    // ROUTE TPA
    Route::resource('tpa', JadwalAjarController::class)->except('show');
  
    // ROUTE KONSUMSI
    Route::resource('konsumsi', KonsumsiController::class)->except('show');

    // ROUTE TARAWIH
    Route::resource('tarawih', TarawihController::class)->except('show');
    
    // ROUTE TADARUS
    Route::resource('tadarus', TadarusController::class)->except('show');
    
    // ROUTE KHATAMAN
    Route::resource('khataman', KhatamanController::class)->except('show');
    
    // ROUTE ZAKAT
    Route::resource('zakat', ZakatController::class)->except('show');

    // ROUTE TAKBIRAN
    Route::resource('takbiran', TakbiranController::class)->except('show');
    
    // ROUTE SHOLATIED
    Route::resource('sholatied',SholatiedController::class)->except('show');
    
    // ROUTE WARGA
    Route::resource('warga', WargaController::class)->except('show');
    
    // ROUTE LAPORAN
    Route::get('/laporan-imam', [LaporanController::class, 'index']);
    Route::get('/laporan-kultum', [LaporanController::class, 'indexKultum']);
    Route::get('/laporan-konsumsi', [LaporanController::class, 'indexKonsumsi']);

    // ROUTE CETAK LAPORAN
    Route::get('/lap-imam/cetak', [LaporanController::class, 'cetakImam']);
    Route::get('/lap-kultum/cetak', [LaporanController::class, 'cetakKultum']);
    Route::get('/lap-konsumsi/cetak', [LaporanController::class, 'cetakKonsumsi']);


});

require __DIR__.'/auth.php';
