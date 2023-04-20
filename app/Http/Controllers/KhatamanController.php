<?php

namespace App\Http\Controllers;

use App\Models\Khataman;
use Illuminate\Http\Request;

class KhatamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $khataman = Khataman::paginate(5);
        // dd($khataman);
        return view('admin.khataman.index', compact('khataman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.khataman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Khataman::create([
            'jenis_kegiatan'    => $request->jenis_kegiatan,
            'tgl_kegiatan'      => $request->tanggal,
            'keterangan'        => $request->keterangan,
        ]);
        return redirect(route('khataman.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Khataman $khataman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Khataman $khataman)
    {
        //
        return view('admin.khataman.edit',[
            'khataman' => $khataman
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Khataman $khataman)
    {
        //
        Khataman::where('id', $khataman->id)->update([
            'jenis_kegiatan'    => $request->jenis_kegiatan,
            'tgl_kegiatan'      => $request->tanggal,
            'keterangan'        => $request->keterangan,
        ]);
        return redirect(route('khataman.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Khataman $khataman)
    {
        $khataman->delete();
        return redirect(route('khataman.index'));
    }
}
