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

        $jumlahustadh = [];
        $jumlahajar = [];
        foreach ($countUstad as $key => $value) {
            // dump($value->ustadh->nama);
            array_push($jumlahustadh,[
                $value->ustadh->nama,
            ]);
            array_push($jumlahajar,[
                static::countUstadhSchedule('tpa',$value->id_ustadh)
            ]);
        }
        $ea = JadwalAjar::all();
        // dump($jumlahajar,$jumlahustadh);
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
        $namakelompok = Tadarus::all();
        $tadarus = [
            'jumlah' => [],
            'listnama' => [],
        ];
        foreach ($namakelompok as $key => $value) {
            array_push($tadarus['jumlah'], $value->jumlah_khatam);
            array_push($tadarus['listnama'], $value->nama_kelompok);
        }
        return view('admin.dashboard.dashtadarus', compact('namakelompok','tadarus'));
    }

    public function getTadarus()
    {
        return response()->json([
            json_encode(Tadarus::all()->pluck('nama_kelompok'))
        ]);
    }

    public function countUstadhSchedule($table, $id)
    {
        switch ($table) {
            case 'tpa':
                $result = JadwalAjar::select('id_ustadh')->where('id_ustadh','=',$id)->count();
                break;
            case 'tadarus':
                $result = JadwalAjar::select('id_ustadh')->where('id_ustadh','=',$id)->count();
                break;
            default:
                # code...
                break;
        }
    //    $result = JadwalAjar::select('id_ustadh')->where('id_ustadh','=',$id)->count();
       return $result;
    }
}
