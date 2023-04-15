<?php

namespace App\Http\Controllers;

use App\Models\Konsumsi;
use Illuminate\Http\Request;

class KonsumsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.konsumsi.index');
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.konsumsi.create');
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
    public function show(Konsumsi $konsumsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Konsumsi $konsumsi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Konsumsi $konsumsi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Konsumsi $konsumsi)
    {
        // 
    }
}
