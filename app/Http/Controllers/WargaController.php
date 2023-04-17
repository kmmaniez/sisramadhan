<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $warga = Warga::all();
        return view('admin.warga.index', compact('warga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $listrt = [];
        $listrw = [];
        for ($i=1; $i <= 10; $i++) { 
            array_push($listrt, $i);
            array_push($listrw, $i);
        }
        // dd($list, $warga, $aw);
        return view('admin.warga.create', [
            'listrt' => $listrt,
            'listrw' => $listrw,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Warga::create([
            'nama_keluarga' => $request->nama_keluarga,
            'nama_asli' => $request->nama_asli,
            'nama_alias' => $request->nama_alias,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'nomor_hp' => $request->nomorhp,
            'email' => $request->email,
        ]);
        return redirect(route('warga.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Warga $warga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warga $warga)
    {
        //
        $listrt = [];
        $listrw = [];
        for ($i=1; $i <= 10; $i++) { 
            array_push($listrt, $i);
            array_push($listrw, $i);
        }
        return view('admin.warga.edit', [
            'warga' => $warga,
            'listrt' => $listrt,
            'listrw' => $listrw,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Warga $warga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warga $warga)
    {
        //
        $warga->delete();
        return redirect(route('warga.index'));
    }
}
