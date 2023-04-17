<?php

namespace App\Http\Controllers;

use App\Models\JadwalAjar;
use App\Models\Tadarus;
use App\Models\Ustadh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function tpa(Request $request)
    {
        // $request->only('selec');
        // SELECT COUNT(id_ustadh) as JUMLAHPertemuan FROM `jadwal_ajar` WHERE id_ustadh=1; 
        // $namakelompok = Ustadh::all()->pluck('nama');
        // $aw = DB::select('SELECT COUNT(id_ustadh) as JUMLAHPertemuan FROM `jadwal_ajar` WHERE id_ustadh=5; ');
        // $cc = JadwalAjar::where('id_ustadh','=',5)->count();
        $countUstad = JadwalAjar::select('id_ustadh')->groupBy('id_ustadh')->get();
        $ust = JadwalAjar::all();
        // $ss = JadwalAjar::select('id_ustadh')->where('id_ustadh','=',3)->count();

        $jumlahustadh = [];
        $jumlahajar = [];
        foreach ($countUstad as $key => $value) {
            array_push($jumlahustadh,[
                $value->id_ustadh,
            ]);
            array_push($jumlahajar,[
                static::countUstadhSchedule($value->id_ustadh)
            ]);
        }
        // $qq = DB::select('SELECT u.nama
        // FROM `jadwal_ajar` as j JOIN ustadh as u 
        // ON u.kode_ust = j.id_ustadh
        // GROUP BY j.id_ustadh;');
        // dump($ust);
        $namakelompok = JadwalAjar::all()->pluck('id_ustadh');
        $listustad = [
            'nama_ustadh' =>collect($jumlahustadh),
            'total_ajar' =>collect($jumlahajar),
        ];
        return view('admin.dashboard.dashtpa', compact('namakelompok','listustad'));
    }
    
    public function konsumsi()
    {
        return view('admin.dashboard.dashkonsumsi');
    }
    
    public function tarawih()
    {
        return view('admin.dashboard.dashtarawih');
    }
    
    public function tadarus()
    {
        $namakelompok = Tadarus::all()->pluck('nama_kelompok');
        return view('admin.dashboard.dashtadarus', compact('namakelompok'));
    }

    public function getTadarus()
    {
        return response()->json([
            json_encode(Tadarus::all()->pluck('nama_kelompok'))
        ]);
    }

    public function countUstadhSchedule($id)
    {
       $result = JadwalAjar::select('id_ustadh')->where('id_ustadh','=',$id)->count();
       return $result;
    }
}
