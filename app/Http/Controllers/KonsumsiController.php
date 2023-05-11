<?php

namespace App\Http\Controllers;

use App\Models\Konsumsi;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use function PHPUnit\Framework\isNull;

class KonsumsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konsumsi = Konsumsi::paginate(5);
        $konsumsis = Konsumsi::all();
        $resultSearch = [];
        if (request()->search) {
            $params = request()->search;
            $users = DB::table('konsumsi')
                ->whereJsonContains('warga_takjil', $params)
                ->orWhereJsonContains('warga_jabur', $params)
                ->orWhereJsonContains('warga_bukber', $params)
                ->get();
            $resultSearch['data'] = $users;
        }
        return view('admin.konsumsi.index', compact('konsumsi', 'resultSearch'));
    }

    public function filterDataByYears(Request $request)
    {
        if ($request->year) {
            $data = DB::select("SELECT * FROM `konsumsi` WHERE YEAR(tgl_kegiatan)='$request->year'");
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
        $warga = Warga::select(['id', 'nama_alias'])->get();
        return view('admin.konsumsi.create', compact('warga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        Konsumsi::create([
            'tgl_kegiatan'  => $request->tanggal,
            'warga_takjil'    => json_encode($request->wargatakjil) ?? NULL,
            'warga_bukber'  => json_encode($request->wargabukber) ?? NULL,
            'warga_jabur'  => json_encode($request->wargajabur) ?? NULL,
            'keterangan'  => $request->keterangan,
        ]);
        return Redirect::to(route('konsumsi.index'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Konsumsi $konsumsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Konsumsi $konsumsi)
    {
        return view('admin.konsumsi.edit', [
            'konsumsi' => $konsumsi,
            'warga' => Warga::all(),
            'jabur' => Konsumsi::select('warga_jabur')->where('id', $konsumsi->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Konsumsi $konsumsi)
    {
        dd($request->all());
        Konsumsi::where('id', $konsumsi->id)->update([
            'tgl_kegiatan'  => $request->tanggal,
            'warga_takjil'    => json_encode($request->wargatakjil) ?? NULL,
            'warga_bukber'  => json_encode($request->wargabukber) ?? NULL,
            'warga_jabur'  => json_encode($request->wargajabur) ?? NULL,
            'keterangan'  => $request->keterangan,
        ]);
        return Redirect::to(route('konsumsi.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Konsumsi $konsumsi)
    {
        $konsumsi->delete();
        return redirect(route('konsumsi.index'));
    }
}
