<?php

namespace App\Http\Controllers;

use App\Models\Zakat;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
        dd($request->all());
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
        // dump($zakat->nama_penerima_zakat);
        $penerima = json_decode($zakat->nama_penerima_zakat);
        $petugas = json_decode($zakat->nama_petugas_zakat);
        $penerimalist = '';
        $petugaslist = '';
        foreach ($penerima as $key => $value) {
            $penerimalist .= $value . ', ';
            
        }
        foreach ($petugas as $key => $value) {
            $petugaslist .= $value . ', ';
        }
        $ea = strrpos(',',$petugaslist);
        
        // print_r(strlen($penerimalist) - 2);
        return view('admin.zakat.edit',[
            'zakat' => $zakat,
            'penerima' => $penerimalist,
            'petugas' => $petugaslist
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Zakat $zakat)
    {
        //
        echo strlen($request->penerima) - 2;
        // echo str_word_count($request->penerima);
        dd($request->all());
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
     * Remove the specified resource from storage.
     */
    public function destroy(Zakat $zakat)
    {
        $zakat->delete();
        return redirect(route('zakat.index'));
    }
}
