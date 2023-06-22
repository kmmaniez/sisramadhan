<?php

namespace App\Http\Controllers;

use App\Models\Konsumsi;
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
            $sq = Takbiran::with('wargas')
            ->where('keterangan','LIKE',"%$params%")
            ->orWhereHas('wargas', function($query) use ($params){
                $query->where('nama_alias','LIKE',"%$params%");
            })->get();
            array_push($resultSearch, $sq);
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
        $wargakonsumsi = $request->wargakonsumsi;
        try {
            Takbiran::where('id', $takbiran->id)->update([
                'tgl_kegiatan' => $request->tanggal,
                'keterangan' => $request->keterangan
            ]);
            $takbiran->wargas()->sync($wargakonsumsi);
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
}
