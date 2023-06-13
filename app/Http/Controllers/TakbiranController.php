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

        // dump($ea);
        if (request()->only('search')) {
            $params = request()->search;
            $searchQuery = DB::select("SELECT * FROM takbiran_warga join warga WHERE warga.id = takbiran_warga.warga_id and warga.nama_asli LIKE '%$params%' ");
            // dump($searchQuery);
            // $resultSearch['data'] = $searchQuery;
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
        // $takbiranwarga = DB::table('takbiran_warga')->where('takbiran_id',$takbiran->id)->get()->toArray();
        // $takbiranwarga = Takbiran::with('wargas')->map(function ($data){

        // })->where('');
        $selected = [];
        $arr1 = [
            0 => [
                'nama' => 'satu'
            ],
            1 => [
                'nama' => 'dua',
                'status' => true,
            ],
            2 => [
                'nama' => 'tiga',
                'status' => true,
            ],
            3 => [
                'nama' => 'empat'
            ]
        ];
        $arr2 = [
            'nama' => 'empat',
            'status' => true
        ];
        // $selected['select'] = $takbiranwarga[0];
        // $selected['warga'] = $warga;
        // foreach ($warga as $key => $value) {
        //     array_push($selected,[
        //         'id' => $value->id,
        //         'nama' => $value->nama_alias,
        //         'selected' => ($key %2 === 0) ? true : false
        //     ]);
        // }
        // dump($selected,);
        return view('admin.takbiran.edit', [
            'warga' => $warga,
            'takbiran' => $takbiran,
            'pivot' => DB::table('takbiran_warga')->where('takbiran_id', $takbiran->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Takbiran $takbiran)
    {
        dd($request->all());
        Takbiran::where('id', $takbiran->id)->update([
            'id_warga' => $request->id_warga, 
            'tgl_kegiatan' => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);
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
