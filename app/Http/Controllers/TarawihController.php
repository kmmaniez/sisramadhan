<?php

namespace App\Http\Controllers;

use App\Models\Tarawih;
use App\Models\Warga;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Raw;

use function Pest\Laravel\get;

class TarawihController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarawih = Tarawih::paginate(5);
        $resultSearch = [];

        if (request()->search) {
            $params = request()->search;
            $searchQuery = Tarawih::join('warga', function (JoinClause $join){
                $join->on('tarawih.id_imam','=','warga.id')
                    ->orOn('tarawih.id_penceramah','=','warga.id')
                    ->orOn('tarawih.id_bilal','=','warga.id');
            })->where('warga.nama_alias','LIKE', "%$params%")->get();

            array_push($resultSearch, $searchQuery);            
        }
        return view('admin.tarawih.index', compact('tarawih','resultSearch'));
    }

    public function filterDataByYears(Request $request)
    {
        $data = Tarawih::select('*')->where(DB::raw('YEAR(tgl_kegiatan)'), $request->year)->get();
        $result = array('data' => []);
        foreach ($data as $key => $value) {
            array_push($result['data'], [
                'id'            => $value->id,
                'tgl_kegiatan'  => $value->tgl_kegiatan,
                'imam'          => $value->imam->nama_alias,
                'penceramah'    => $value->penceramah->nama_alias,
                'bilal'         => $value->bilal->nama_alias,
                'keterangan'    => $value->keterangan,
            ]);
        } 
        return response()->json([
            'status' => 'success',
            'data' => $result['data'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warga = Warga::all()->pluck('nama_alias','id');
        $usersImam = Warga::select('*')->whereJsonContains('kontribusi','imam')->get();
        $usersPenceramah = Warga::select('*')->whereJsonContains('kontribusi','penceramah')->get();
        $usersBilal = Warga::select('*')->whereJsonContains('kontribusi','bilal')->get();
        return view('admin.tarawih.create', compact('warga','usersImam','usersPenceramah','usersBilal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Tarawih::create([
            'tgl_kegiatan' => $request->tanggal,
            'id_imam' => $request->id_imam,
            'id_penceramah' => $request->id_penceramah,
            'id_bilal' => $request->id_bilal,
            'keterangan' => $request->keterangan,
        ]);
        return redirect(route('tarawih.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarawih $tarawih)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarawih $tarawih)
    {
        return view('admin.tarawih.edit', [
            'tarawih' => $tarawih,
            'warga' => Warga::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarawih $tarawih)
    {
        Tarawih::where('id', $tarawih->id)->update([
            'tgl_kegiatan' => $request->tanggal,
            'id_imam' => $request->id_imam,
            'id_penceramah' => $request->id_penceramah,
            'id_bilal' => $request->id_bilal,
            'keterangan' => $request->keterangan,
        ]);
        return redirect(route('tarawih.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarawih $tarawih)
    {
        $tarawih->delete();
        return redirect(route('tarawih.index'));
    }
}
