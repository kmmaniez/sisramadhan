<?php

namespace App\Http\Controllers\Tadarus;

use App\Http\Controllers\Controller;
use App\Models\KelTadarus;
use App\Models\Tadarus;
use App\Models\Takbiran;
use App\Models\Tarawih;
use App\Models\Warga;
use Illuminate\Console\View\Components\Warn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class TadarusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Tadarus::all());exit;
        $tadarus = Tadarus::select('*')
        ->havingRaw('YEAR(tahun_kegiatan) = ?', [date('Y')])
        ->get();
        $resultSearch = [];
        if (request()->search) {
            $params = request()->search;
            $users = DB::table('tadarus')
                ->whereJsonContains('nama_warga', $params)
                ->orWhere('nama_kelompok','LIKE', "%$params%")
                ->get();
            // $resultSearch['data'] = Tadarus::where('nama_kelompok','LIKE',"%$params%")->get();
            $resultSearch['data'] = Tadarus::with('wargas')
            ->where('nama_kelompok','LIKE',"%$params%")
            ->orWhereHas('wargas', function($query) use ($params){
                $query->where('nama_alias','LIKE',"%$params%");
            })->get();
        }
        return view('admin.tadarus.index', compact('tadarus','resultSearch'));
    }

    public function filterDataByYears(Request $request)
    {
        if ($request->year) {
            $datanew = Tadarus::query()->where(DB::raw('YEAR(tahun_kegiatan)'),"$request->year")->get()->toArray();
            return response()->json([
                'status' => 'success',
                'datan' => $datanew
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warga  = Warga::select('id','nama_alias')->get();
        $listJuz = [];

        for ($i=1; $i <= 30; $i++) { 
            array_push($listJuz, $i);
        }
        // dd($warga);
        // $listkelompok  = KelTadarus::all()->pluck('nama_kelompok','id');
        return view('admin.tadarus.create', compact('warga','listJuz'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $listanggota = $request->anggota;
        // dd($request->all());
        try {
            $TadarusId = Tadarus::create([
                'tahun_kegiatan' => date(now()),
                'nama_kelompok' => $request->nama_kelompok,
                'jumlah_khatam' => $request->jumlah_khatam,
            ])->id;
            foreach ($listanggota as $data) {
                DB::table('tadarus_warga')->insert([
                    'tadarus_id' => $TadarusId,
                    'warga_id' => $data
                ]);
            }
        } catch (\Throwable $th) {
                DB::rollBack();
        }
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
        $listJuz = [];
        for ($i=1; $i <= 30; $i++) { 
            array_push($listJuz, $i);
        }
        // $takbiranByWarga = Tadarus::select('warga_id')->where('tadarus_id', $tadarus->id)->get();
        $takbiranByWarga = DB::table('tadarus_warga')->where('tadarus_id', $tadarus->id)->get();
        $selectedWarga = [];
        foreach ($takbiranByWarga as $key => $value) {
            array_push($selectedWarga, $value->warga_id);
        }
        return view('admin.tadarus.edit', [
            'tadarus' => $tadarus,
            'warga' => Warga::all(),
            'listJuz' => $listJuz,
            'selected' => $selectedWarga
        ]);
    }
    public function select()
    {
        $wargaAll = Warga::select('id',DB::raw('nama_alias as text'))->get()->toArray();
        $tadarusById = Tadarus::select('id','nama_warga')->where('id',11)->get();
        $listwarga = Warga::all('id',DB::raw('nama_alias as text'))->toArray();
        $wargabaru = ['data' => []];
        $wargabaru['data'] = $listwarga;
        for ($i=0; $i < count($listwarga); $i++) { 
            if ($i%3===0) {
                $wargabaru['data'][$i]['selected'] = true;
            }
        }
        return response()->json([
            'data' => $wargaAll,
            'warga'=> $wargabaru
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tadarus $tadarus)
    {
        // dd($request->all());
        $listanggota = $request->anggota;
        // dd($listanggota);
        try {
            Tadarus::where('id', $tadarus->id)->update([
                'nama_kelompok' => $request->nama_kelompok,
                'jumlah_khatam' => $request->jumlah_khatam,
            ]);
            
            $tadarus->wargas()->sync($listanggota);
        } catch (\Throwable $th) {
            DB::rollBack();
        }
        // if (empty($request->anggota)) {
        //     Tadarus::where('id', $tadarus->id)->update([
        //         'nama_kelompok' => $request->nama_kelompok,
        //         'nama_warga' => $tadarus->nama_warga,
        //         'jumlah_khatam' => $request->jumlah_khatam,
        //     ]);
        // }else{
        //     Tadarus::where('id', $tadarus->id)->update([
        //         'nama_kelompok' => $request->nama_kelompok,
        //         'nama_warga' => json_encode($request->anggota),
        //         'jumlah_khatam' => $request->jumlah_khatam,
        //     ]);
        // }
        return redirect(route('tadarus.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tadarus $tadarus)
    {
        $tadarus->delete();
        return redirect(route('tadarus.index'));
    }
}
