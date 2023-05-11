<?php

namespace App\Http\Controllers\Tadarus;

use App\Http\Controllers\Controller;
use App\Models\KelTadarus;
use App\Models\Tadarus;
use App\Models\Tarawih;
use App\Models\Warga;
use Illuminate\Console\View\Components\Warn;
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
            // $searchQuery = DB::select("SELECT * FROM tadarus WHERE nama_kelompok LIKE '%$params%' ");
            // array_push($resultSearch, $searchQuery);

            $users = DB::table('tadarus')
                ->whereJsonContains('nama_warga', $params)
                ->orWhere('nama_kelompok','LIKE', "%$params%")
                ->get();
            $resultSearch['data'] = $users;
            // dump($resultSearch['data']);
        }
        return view('admin.tadarus.index', compact('tadarus','resultSearch'));
    }

    public function filterDataByYears(Request $request)
    {
        if ($request->year) {
            $data = DB::select("SELECT * FROM `tadarus` WHERE YEAR(tahun_kegiatan)='$request->year'");
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
        $warga  = Warga::all()->pluck('nama_alias','id');
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
        //
        // dd($request->all());
        Tadarus::create([
            'tahun_kegiatan' => date(now()),
            'nama_kelompok' => $request->nama_kelompok,
            'nama_warga' => json_encode($request->anggota),
            'jumlah_khatam' => $request->jumlah_khatam,
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
        $listJuz = [];
        for ($i=1; $i <= 30; $i++) { 
            array_push($listJuz, $i);
        }
        // $listwarga = Warga::all('id',DB::raw('nama_alias as text'))->toArray();
        // $arrwargatadarus = [
        // ];
        // $listwargatadarus = json_decode($tadarus->nama_warga);
        // for ($i=0; $i < count($listwargatadarus); $i++) { 
        //     array_push($arrwargatadarus,[
        //         'nama_alias' => $listwargatadarus[$i]
        //     ]);
        // }
        // $wargabaru = [];
        // $wargabaru['data'] = $listwargatadarus;

        // echo 'arrwargabaru';
        // dump($arrwargatadarus);

        return view('admin.tadarus.edit', [
            'tadarus' => $tadarus,
            'warga' => Warga::all(),
            'listJuz' => $listJuz,
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
        $listanggota = $request->anggota;
        if (empty($request->anggota)) {
            // echo 'kosong';
            Tadarus::where('id', $tadarus->id)->update([
                'nama_kelompok' => $request->nama_kelompok,
                'nama_warga' => $tadarus->nama_warga,
                'jumlah_khatam' => $request->jumlah_khatam,
            ]);
        }else{
            // echo 'ada';
            Tadarus::where('id', $tadarus->id)->update([
                'nama_kelompok' => $request->nama_kelompok,
                'nama_warga' => json_encode($request->anggota),
                'jumlah_khatam' => $request->jumlah_khatam,
            ]);
        }
        // Tadarus::where('id', $tadarus->id)->update([
        //     'nama_kelompok' => $request->nama_kelompok,
        //     'nama_warga' => json_encode($request->anggota),
        //     'jumlah_khatam' => $request->jumlah_khatam,
        // ]);
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
