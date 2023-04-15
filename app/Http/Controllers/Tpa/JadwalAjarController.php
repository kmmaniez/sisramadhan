<?php

namespace App\Http\Controllers\Tpa;

use App\Http\Controllers\Controller;
use App\Models\Hari;
use App\Models\JadwalAjar;
use App\Models\Ustadh;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalAjarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwalajar = JadwalAjar::all();
        $jadwal['senin'] = [];
        $jadwal['selasa'] = [];
        $jadwal['rabu'] = [];
        $jadwal['kabis'] = [];
        $jadwal['jumat'] = [];
        $jadwal['sabtu'] = [];
        
        return view('admin.tpa.index', compact('jadwalajar','jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listhari = Hari::all();
        $listustadh = Ustadh::all();
        // dd($listustadh);
        return view('admin.tpa.create', compact('listhari','listustadh'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        JadwalAjar::create([
            'id_ustadh'     => $request->listustadh,
            'id_hari'       => $request->listhari,
            'tahun'         => Carbon::parse($request->tanggal)->translatedFormat('Y'),
            'tgl_masehi'    => $request->tanggal,
        ]);
        return redirect(route('tpa.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalAjar $jadwalAjar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalAjar $jadwalAjar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalAjar $jadwalAjar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalAjar $jadwalAjar)
    {
        //
    }
}
