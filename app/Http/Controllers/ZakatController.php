<?php

namespace App\Http\Controllers;

use App\Models\Zakat;
use Illuminate\Http\Request;

class ZakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zakat = Zakat::all();
        // dd($zakat);
        return view('admin.zakat.index', compact('zakat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.zakat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $penerima   = json_encode(explode(',', $request->penerima));
        $petugas    = json_encode(explode(',', $request->petugas));
        // print_r($new);
        // die;
        Zakat::create([
           'nama_petugas_zakat'     => $petugas, 
           'nama_penerima_zakat'    => $penerima, 
           'tgl_kegiatan'           => $request->tanggal, 
           'keterangan'             => $request->keterangan, 
        ]);
        return redirect(route('zakat.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Zakat $zakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Zakat $zakat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Zakat $zakat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zakat $zakat)
    {
        $zakat->delete();
        return redirect(route('zakat.index'));
    }
}
