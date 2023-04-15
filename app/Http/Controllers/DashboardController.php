<?php

namespace App\Http\Controllers;

use App\Models\JadwalAjar;
use App\Models\Tadarus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function tpa()
    {
        return view('admin.dashboard.dashtpa',[
            'title' => 'ea'
        ]);
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
        $namakelompok = Tadarus::all()->pluck('nama_kelompok')->toJson();
        return view('admin.dashboard.dashtadarus', compact('namakelompok'));
    }

    public function getTadarus()
    {
        return response()->json([
            json_encode(Tadarus::all()->pluck('nama_kelompok'))
        ]);
    }
}
