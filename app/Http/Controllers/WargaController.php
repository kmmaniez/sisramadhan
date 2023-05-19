<?php

namespace App\Http\Controllers;

use App\Models\KontribusiWarga;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warga = Warga::paginate(10);
        $resultSearch = [];

        if (request()->search) {
            $params = request()->search;
            $searchQuery = DB::table('warga')
                ->where('nama_keluarga','like',"%$params%")
                ->orWhere('nama_asli','like',"%$params%")
                ->orWhere('nama_alias', 'like',"%$params%")
                ->orWhere('alamat', 'like',"%$params%")->get();
            array_push($resultSearch, $searchQuery);
        }
        return view('admin.warga.index', compact('warga', 'resultSearch'));
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
        Warga::create([
            'nama_keluarga' => $request->nama_keluarga,
            'nama_asli' => $request->nama_asli,
            'nama_alias' => $request->nama_alias,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'nomor_hp' => $request->nomorhp,
            'email' => $request->email,
            'status_keaktifan' => ($request->input('status') === 'aktif') ? true : false,
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
        // dd($request->all());
        Warga::where('id', $warga->id)->update([
            'nama_keluarga' => $request->nama_keluarga,
            'nama_asli' => $request->nama_asli,
            'nama_alias' => $request->nama_alias,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'nomor_hp' => $request->nomorhp,
            'email' => $request->email,
            'status_keaktifan' => ($request->input('status') === 'aktif') ? true : false,
        ]);
        return redirect(route('warga.index'));
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
