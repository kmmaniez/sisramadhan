<?php

namespace App\Http\Controllers\Tadarus;

use App\Http\Controllers\Controller;
use App\Models\KelTadarus;
use App\Models\Tadarus;
use App\Models\Warga;
use Illuminate\Http\Request;

class TadarusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tadarus = Tadarus::all();
        $warga  = Warga::all();

        return view('admin.tadarus.index', compact('tadarus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warga  = Warga::all()->pluck('nama_alias','id');
        $listkelompok  = KelTadarus::all()->pluck('nama_kelompok','id');
        return view('admin.tadarus.create', compact('warga', 'listkelompok'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tadarus $tadarus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tadarus $tadarus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tadarus $tadarus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tadarus $tadaru)
    {
        //
    }
}