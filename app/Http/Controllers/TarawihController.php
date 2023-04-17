<?php

namespace App\Http\Controllers;

use App\Models\Tarawih;
use App\Models\Warga;
use Illuminate\Http\Request;

class TarawihController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    // $ea = date('D');
        // echo $ea;
        $tarawih = Tarawih::all();
        return view('admin.tarawih.index', compact('tarawih'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warga = Warga::all()->pluck('nama_alias','id');
        return view('admin.tarawih.create', compact('warga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        Tarawih::create([
            'tgl_kegiatan' => $request->tanggal,
            'id_imam' => $request->id_imam,
            'id_penceramah' => $request->id_penceramah,
            'id_bilal' => $request->id_bilal,
            'keterangan' => $request->keterangan,
        ]);
        return redirect(route('tarawih.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarawih $tarawih)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarawih $tarawih)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarawih $tarawih)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarawih $tarawih)
    {
        $tarawih->delete();
        return redirect(route('tarawih.index'));
    }
}
