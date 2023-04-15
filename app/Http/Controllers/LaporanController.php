<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    // default tampilan imam & bilal
    public function index()
    {
        $warga = Warga::all();
        return view('admin.laporan.lap_imam', [
            'warga' => $warga
        ]);
    }
    public function cetakImam()
    {
        $data = Warga::all();
        $pdf    = PDF::loadView('admin.laporan.print.cetak_imam',[
            'warga'  => $data 
        ]);
        return $pdf->download('cetak-imam.pdf');
    }
    
    // INDEX & CETAK KULTUM
    public function indexKultum()
    {
        return view('admin.laporan.lap_kultum');
    }
    public function cetakKultum()
    {
        $data = Warga::all();
        $pdf    = PDF::loadView('admin.laporan.print.cetak_kultum',[
            'warga'  => $data 
        ]);
        return $pdf->download('cetak-kultum.pdf');
    }
    
    // INDEX & CETAK KONSUMSI
    public function indexKonsumsi()
    {
        return view('admin.laporan.lap_konsumsi');
    }
    public function cetakKonsumsi()
    {
        $data = Warga::all();
        $pdf    = PDF::loadView('admin.laporan.print.cetak_konsumsi',[
            'warga'  => $data 
        ]);
        return $pdf->download('cetak-konsumsi.pdf');
    }
}
