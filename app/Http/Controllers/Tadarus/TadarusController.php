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
        $datawarga = [];
        $saw = [];
        foreach ($tadarus as $key => $value) {
            // $a = json_decode($value['nama_lengkap']);
            $saw[] = json_decode($value->nama_warga);
            // dump($value);
        }
        
        // dump($tadarus, $saw);
        // die;
        foreach ($tadarus as $key => $value) {
            $datawarga['data'] = json_decode($value->nama_warga);
        }
        // $wargaDetail = $warga->whereIn('id',$datawarga['data']);
        return view('admin.tadarus.index', compact('tadarus'));
        
        $wargajson = [];
        // $wargajson['data'][key][value]
        // foreach ($wargajson['data'] as $key => $value) {
        //     foreach ($value as $values) {
        //         # code...
        //         // echo $values. ' ';
        //     }
        //     // echo $key. ' ';
        // }
        // dump($tadarus, $wargajson['data']);
        // die;
        $aw = $tadarus->whereIn('id',$datawarga['data']);
        $wargaDetail = $warga->whereIn('id',$datawarga['data']);
        // dd($tadarus, $wargaDetail);
        return view('admin.tadarus.index', compact('tadarus','wargaDetail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warga  = Warga::all()->pluck('nama_alias','id');
        // dd($warga);
        $listkelompok  = KelTadarus::all()->pluck('nama_kelompok','id');
        return view('admin.tadarus.create', compact('warga', 'listkelompok'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        Tadarus::create([
            'nama_kelompok' => $request->nama_kelompok,
            'nama_warga' => json_encode($request->anggota),
            'jumlah_khatam' => $request->jumlah_khatam,
            'keterangan' => '1',
        ]);
        return redirect(route('tadarus.index'));
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
        $tadaru->delete();
        return redirect(route('tadarus.index'));
    }
}
