<?php

namespace App\Http\Controllers;

use App\Models\Zakat;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ZakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zakat = Zakat::all();
        $resultSearch = [];

        if (request()->search) {
            $params = request()->search;
            $users = DB::table('zakat')
                ->whereJsonContains('nama_petugas_zakat',"$params")
                ->orWhereJsonContains('nama_penerima_zakat', "$params")
                ->get();
            $resultSearch['data'] = $users;
        }
        return view('admin.zakat.index', compact('zakat','resultSearch'));
    }

    public function filterDataByYears(Request $request)
    {
        if ($request->year) {
            $data = DB::select("SELECT * FROM `zakat` WHERE YEAR(tgl_kegiatan)='$request->year'");
            return response()->json([
                'status' => 'success',
                'data' => $data,
            ]);
        }
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

        $penerima   = json_encode(explode(',', $request->penerima));
        $petugas    = json_encode(explode(',', $request->petugas));
        
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
        $dataPenerima = json_decode($zakat->nama_penerima_zakat);
        $dataPetugas = json_decode($zakat->nama_petugas_zakat);
        $penerimalist = '';
        $petugaslist = '';

        foreach ($dataPenerima as $key => $value) {
            $penerimalist .= $value . ',';
        }

        foreach ($dataPetugas as $key => $value) {
            $petugaslist .= $value . ',';
        }

        $newPenerimaList = '';
        $arrPenerima = str_split($penerimalist);
        for ($i=0; $i < count($arrPenerima) - 1 ; $i++) { 
            $newPenerimaList .= $arrPenerima[$i];
        }

        $newPetugasList = '';
        $arrPetugas = str_split($petugaslist);
        for ($i=0; $i < count($arrPetugas) - 1 ; $i++) { 
            $newPetugasList .= $arrPetugas[$i];
        }

        return view('admin.zakat.edit',[
            'zakat' => $zakat,
            'penerima' => $newPenerimaList,
            'petugas' => $newPetugasList
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Zakat $zakat)
    {
        $penerima   = json_encode(explode(',', $request->penerima));
        $petugas    = json_encode(explode(',', $request->petugas));
        
        Zakat::where('id', $zakat->id)->update([
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
        return redirect()->back();
    }
}
