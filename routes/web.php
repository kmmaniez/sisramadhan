<?php
require public_path('/lib/Hijri_GregorianConvert.php');

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KhatamanController;
use App\Http\Controllers\KonsumsiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PublicController;
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
Route::get('/dashboard', function(){
    return view('admin.dashboard.index');
})->middleware('auth')->name('dashboard');

Route::controller(PublicController::class)->group(function(){
    Route::get('/tpa', 'tpaIndex');
    Route::get('/konsumsi', 'konsumsiIndex');
    Route::get('/tarawih', 'tarawihIndex');
    Route::get('/tadarus', 'tadarusIndex');
    Route::get('/khataman', 'khatamanIndex');
    Route::get('/zakat', 'zakatIndex');
    Route::get('/takbiran', 'takbiranIndex');
    Route::get('/sholatied', 'sholatiedIndex');
});

Route::middleware('guest')->group(function(){
    // LOGIN GOOGLE
    Route::get('/auth/{provider}',          [SocialiteController::class, 'redirectToProvider']);
    Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);
});

Route::prefix('admin')->middleware('auth')->group(function () {
    
    Route::get('/',[DashboardController::class, 'index']);

    // ROUTE DASHBOARD
    Route::get('/dashtpa',      [DashboardController::class,'tpa'])->name('dash.tpa');

    Route::get('/dashkonsumsi', [DashboardController::class,'konsumsi'])->name('dash.konsumsi');
    Route::get('/dashkonsumsi/filterYear', [DashboardController::class,'filterKonsumsiByYears'])->name('dashkonsumsi.search');
    
    Route::get('/dashtarawih',  [DashboardController::class,'tarawih'])->name('dash.tarawih');
    Route::get('/dashtarawih/filterYear', [DashboardController::class,'filterTarawihByYears'])->name('dashtarawih.search');
    
    Route::get('/dashtadarus',  [DashboardController::class,'tadarus'])->name('dash.tadarus');
    Route::get('/dashtadarus/filterYear', [DashboardController::class,'filterTadarusByYears'])->name('dashtadarus.search');
    
    Route::get('/getTadarus',   [DashboardController::class,'getTadarus']);
       
    // ROUTE TPA
    Route::resource('tpa', JadwalAjarController::class)->except('show');
  
    // ROUTE KONSUMSI
    Route::controller(KonsumsiController::class)->group(function(){
        Route::get('/konsumsi', 'index')->name('konsumsi.index');
        Route::get('/konsumsi/filterYear', 'filterDataByYears')->name('konsumsi.search');

        Route::get('/konsumsi/create', 'create')->name('konsumsi.create');
        Route::post('/konsumsi', 'store')->name('konsumsi.store');

        Route::get('/konsumsi/edit/{konsumsi}', 'edit')->name('konsumsi.edit');
        Route::put('/konsumsi/edit/{konsumsi}/edit', 'update')->name('konsumsi.update');
        Route::delete('/konsumsi/{konsumsi}', 'destroy')->name('konsumsi.destroy');
    });

    // ROUTE TARAWIH
    Route::controller(TarawihController::class)->group(function(){
        Route::get('/tarawih', 'index')->name('tarawih.index');
        Route::get('/tarawih/filterYear', 'filterDataByYears')->name('tarawih.search');

        Route::get('/tarawih/create', 'create')->name('tarawih.create');
        Route::post('/tarawih', 'store')->name('tarawih.store');

        Route::get('/tarawih/edit/{tarawih}', 'edit')->name('tarawih.edit');
        Route::put('/tarawih/edit/{tarawih}/edit', 'update')->name('tarawih.update');
        Route::delete('/tarawih/{tarawih}', 'destroy')->name('tarawih.destroy');
    });
    
    // ROUTE TADARUS
    Route::controller(TadarusController::class)->group(function(){
        Route::get('/tadarus', 'index')->name('tadarus.index');
        Route::get('/tadarus/filterYear', 'filterDataByYears')->name('tadarus.search');
        Route::get('/tadarus/select', 'select')->name('tadarus.select');
        

        Route::get('/tadarus/create', 'create')->name('tadarus.create');
        Route::post('/tadarus', 'store')->name('tadarus.store');

        Route::get('/tadarus/edit/{tadarus}', 'edit')->name('tadarus.edit');
        Route::put('/tadarus/edit/{tadarus}/edit', 'update')->name('tadarus.update');
        Route::delete('/tadarus/{tadarus}', 'destroy')->name('tadarus.destroy');
    });

    // ROUTE KHATAMAN
    Route::resource('khataman', KhatamanController::class)->except('show');
    
    // ROUTE ZAKAT
    Route::controller(ZakatController::class)->group(function(){
        Route::get('/zakat', 'index')->name('zakat.index');
        Route::get('/filterYear', 'filterDataByYears')->name('zakat.search');

        Route::get('/zakat/create', 'create')->name('zakat.create');
        Route::post('/zakat', 'store')->name('zakat.store');

        Route::get('/zakat/edit/{zakat}', 'edit')->name('zakat.edit');
        Route::put('/zakat/edit/{zakat}/edit', 'update')->name('zakat.update');
        Route::delete('/zakat/{zakat}', 'destroy')->name('zakat.destroy');
    });

    // ROUTE TAKBIRAN
    Route::resource('takbiran', TakbiranController::class)->except('show');
    
    // ROUTE SHOLATIED
    Route::resource('sholatied',SholatiedController::class)->except('show');
    
    // ROUTE WARGA
    Route::resource('warga', WargaController::class)->except('show');
    
    // ROUTE LAPORAN
    Route::get('/laporan-imam',         [LaporanController::class, 'index'])->name('lap.imam');
    Route::get('/laporan-kultum',       [LaporanController::class, 'indexKultum'])->name('lap.kultum');
    Route::get('/laporan-konsumsi',     [LaporanController::class, 'indexKonsumsi'])->name('lap.konsumsi');

    // ROUTE CETAK LAPORAN
    Route::get('/lap-imam/cetak',       [LaporanController::class, 'cetakImam']);
    Route::get('/lap-kultum/cetak',     [LaporanController::class, 'cetakKultum']);
    Route::get('/lap-konsumsi/cetak',   [LaporanController::class, 'cetakKonsumsi']);

});

require __DIR__.'/auth.php';
