<?php

namespace App\Http\Controllers;

use App\Models\Takbiran;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TakbiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resultSearch = [];
        $takbiran = Takbiran::all();

        if (request()->only('search')) {
            $params = request()->search;
            $searchQuery = DB::select("SELECT * FROM takbiran join warga WHERE warga.id = takbiran.id_warga and warga.nama_alias LIKE '%$params%' ");
            array_push($resultSearch, $searchQuery);
        }
        return view('admin.takbiran.index', compact('takbiran', 'resultSearch'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warga = Warga::all()->pluck('nama_alias','id');
        return view('admin.takbiran.create', compact('warga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Takbiran::create([
            'id_warga' => $request->id_warga,
            'tgl_kegiatan' => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);
        return redirect(route('takbiran.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Takbiran $takbiran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Takbiran $takbiran)
    {
        $warga = Warga::all();
        return view('admin.takbiran.edit', [
            'warga' => $warga,
            'takbiran' => $takbiran,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Takbiran $takbiran)
    {
        Takbiran::where('id', $takbiran->id)->update([
            'id_warga' => $request->id_warga,
            'tgl_kegiatan' => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('takbiran.index')->with('success','Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Takbiran $takbiran)
    {
        $takbiran->delete();
        return redirect(route('takbiran.index'));
    }
}
