<?php

namespace App\Http\Controllers;

use App\Models\Sholatied;
use Illuminate\Http\Request;

class SholatiedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sholatied = Sholatied::all();
        return view('admin.sholatied.index', compact('sholatied'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sholatied.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Sholatied::create([
            'tgl_kegiatan' => $request->tanggal,
            'tmpt_sholat' => $request->tempat,
            'keterangan' => $request->keterangan,
        ]);
        return redirect(route('sholatied.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Sholatied $sholatied)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sholatied $sholatied)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sholatied $sholatied)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sholatied $sholatied)
    {
        $sholatied->delete();
        return redirect(route('sholatied.index'));
    }
}
