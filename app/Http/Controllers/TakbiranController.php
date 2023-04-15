<?php

namespace App\Http\Controllers;

use App\Models\Takbiran;
use App\Models\Warga;
use Illuminate\Http\Request;

class TakbiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $takbiran = Takbiran::all();
        return view('admin.takbiran.index', compact('takbiran'));
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Takbiran $takbiran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Takbiran $takbiran)
    {
        // 
    }
}
