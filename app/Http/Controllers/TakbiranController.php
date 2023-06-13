<?php

namespace App\Http\Controllers;

use App\Models\Takbiran;
use App\Models\TakbiranWarga;
use App\Models\Tarawih;
use App\Models\Warga;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Query\JoinClause;
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
            // $searchQuery = DB::select("SELECT * FROM takbiran WHERE takbiran.keterangan LIKE '%$params%' ");
            $searchQuery = Takbiran::where('keterangan','LIKE',"%$params%")->get();
            array_push($resultSearch, $searchQuery);
            dump($resultSearch);
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
        $wargakonsumsi = $request->wargakonsumsi;
        try {
            $TakbiranId = Takbiran::create([
                'tgl_kegiatan' => $request->tanggal,
                'keterangan' => $request->keterangan,
            ])->id;
            foreach ($wargakonsumsi as $data) {
                DB::table('takbiran_warga')->insert([
                    'takbiran_id' => $TakbiranId,
                    'warga_id' => $data
                ]);
            }
        } catch (\Throwable $th) {
                DB::rollBack();
        }
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
        $takbiranByWarga = TakbiranWarga::select('warga_id')->where('takbiran_id', $takbiran->id)->get();
        $selectedWarga = [];
        foreach ($takbiranByWarga as $key => $value) {
            array_push($selectedWarga, $value->warga_id);
        }
        return view('admin.takbiran.edit', [
            'warga' => $warga,
            'takbiran' => $takbiran,
            'selected' => $selectedWarga
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Takbiran $takbiran)
    {
        // dd($request->all());
        $wargakonsumsi = $request->wargakonsumsi;
        try {
            Takbiran::where('id', $takbiran->id)->update([
                'tgl_kegiatan' => $request->tanggal,
                'keterangan' => $request->keterangan
            ]);
            DB::table('takbiran_warga')->where('takbiran_id', $takbiran->id)->delete();
            foreach ($wargakonsumsi as $data) {
                DB::table('takbiran_warga')->insert([
                    'takbiran_id' => $takbiran->id,
                    'warga_id' => $data
                ]);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
        }
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

    public function listwarga($id = null)
    {
        // $mk = Nilai::with('matakuliah')->where('mahasiswas_id', $id)->get();
        // $data = '';
        // foreach ($takbiran as $row) {

        //     $data .= "<option value='$row->id' selected>{$row->wargas->nama_alias}</option>";
        // }
        // return $data;
        $takbiran = TakbiranWarga::select('takbiran_id')->where('takbiran_id', $id)->get();
        $data = Warga::whereNotIn('id', $takbiran)->get();
        dump($data);
    }
}
