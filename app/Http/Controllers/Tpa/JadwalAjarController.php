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
        // dd($jadwalajar);
        $jadwal['senin'] = DB::select("SELECT u.nama FROM `jadwal_ajar` as j
        JOIN hari as h ON j.id_hari = h.id 
        JOIN ustadh as u ON j.id_ustadh = u.kode_ust
        WHERE h.nama_hari='Senin'");

        $jadwal['selasa'] = DB::select("SELECT u.nama FROM `jadwal_ajar` as j
        JOIN hari as h ON j.id_hari = h.id 
        JOIN ustadh as u ON j.id_ustadh = u.kode_ust
        WHERE h.nama_hari='Selasa'");

        $jadwal['rabu'] = DB::select("SELECT u.nama FROM `jadwal_ajar` as j
        JOIN hari as h ON j.id_hari = h.id 
        JOIN ustadh as u ON j.id_ustadh = u.kode_ust
        WHERE h.nama_hari='Rabu'");

        $jadwal['kamis'] = DB::select("SELECT u.nama FROM `jadwal_ajar` as j
        JOIN hari as h ON j.id_hari = h.id 
        JOIN ustadh as u ON j.id_ustadh = u.kode_ust
        WHERE h.nama_hari='kamis'");

$jadwal['jumat'] = DB::select("SELECT u.nama FROM `jadwal_ajar` as j
JOIN hari as h ON j.id_hari = h.id 
JOIN ustadh as u ON j.id_ustadh = u.kode_ust
WHERE h.nama_hari='Jumat'");

        $jj = JadwalAjar::all()->where('id_hari','=',2);
        // dd($jadwalajar, $jj, $jadwal);
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
