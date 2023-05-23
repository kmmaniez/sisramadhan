<?php

namespace App\Http\Controllers;

use App\Models\Konsumsi;
use App\Models\Tarawih;
use App\Models\Warga;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    // default tampilan imam & bilal
    public function index()
    {
        $warga = Warga::all();
        $listtarawih = Tarawih::all();
        return view('admin.laporan.lap_imam', [
            'warga' => $warga,
            'listtarawih'  => $listtarawih
        ]);
    }
    public function cetakImam()
    {
        $data = Warga::all();
        $listtarawih = Tarawih::all();
        $pdf    = PDF::loadView('admin.laporan.print.cetak_imam',[
            'warga'  => $data,
            'listtarawih'  => $listtarawih
        ]);
        return $pdf->download('cetak-imam.pdf');
    }
    
    // INDEX & CETAK KULTUM
    public function indexKultum()
    {
        $listpenceramah = Tarawih::all();
        return view('admin.laporan.lap_kultum', compact('listpenceramah'));
    }
    public function cetakKultum()
    {
        $data = Warga::all();
        $listkonsumsi = Konsumsi::all();
        $pdf    = PDF::loadView('admin.laporan.print.cetak_kultum',[
            'warga'  => $data,
            'listkonsumsi'  => $listkonsumsi
        ]);
        return $pdf->download('cetak-kultum.pdf');
    }
    
    // INDEX & CETAK KONSUMSI
    public function indexKonsumsi()
    {
        $listkonsumsi = Konsumsi::all();
        return view('admin.laporan.lap_konsumsi', compact('listkonsumsi'));
    }
    public function cetakKonsumsi()
    {
        $data = Warga::all();
        $listkonsumsi = Konsumsi::all();
        $pdf    = PDF::loadView('admin.laporan.print.cetak_konsumsi',[
            'warga'  => $data ,
            'listkonsumsi'  => $listkonsumsi ,
        ]);
        return $pdf->download('cetak-konsumsi.pdf');
    }
}
