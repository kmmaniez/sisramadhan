<?php

namespace App\Http\Controllers;

use App\Models\Konsumsi;
use App\Models\Warga;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class KonsumsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konsumsi = Konsumsi::all();
        $resultSearch = ['data' => []];

        if (request()->search) {
            $params = request()->search;
            $listwargatakjil = Warga::where('nama_alias', 'LIKE', "%$params%")->get();
            $listwargajabur = Warga::where('nama_alias', 'LIKE', "%$params%")->get();
            $listwargabukber = Warga::where('nama_alias', 'LIKE', "%$params%")->get();

            $takjilId = $listwargatakjil[0]->id ?? NULL;
            $jaburId = $listwargajabur[0]->id ?? NULL;
            $bukberId = $listwargabukber[0]->id ?? NULL;

            $users = Konsumsi::query()->whereJsonContains('warga_takjil', "$takjilId")
                ->orWhereJsonContains('warga_jabur', "$jaburId")
                ->orWhereJsonContains('warga_bukber', "$bukberId")
                ->get();
            if (count($users) > 0) {
                $resultSearch['data'] = $users;
            }
        }
        return view('admin.konsumsi.index', compact('konsumsi', 'resultSearch'));
    }

    public function filterDataByYears(Request $request)
    {
        if ($request->year) {
            $data = DB::select("SELECT * FROM `konsumsi` WHERE YEAR(tgl_kegiatan)='$request->year'");
            $datanew = Konsumsi::query()->where(DB::raw('YEAR(tgl_kegiatan)'), "$request->year")->get()->toArray();
            return response()->json([
                'status' => 'success',
                'data' => $data,
                'datan' => $datanew
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
        $donaturBukber = $request->donaturbukber;
        $donaturTakjil = $request->donaturtakjil;
        $donaturJabur = $request->donaturjabur;
        try {
            $konsumsiId = Konsumsi::create([
                'tgl_kegiatan'    => $request->tanggal,
                'warga_takjil'    => ($request->donaturtakjil) ? json_encode($request->donaturtakjil): NULL,
                'warga_bukber'    => ($request->donaturbukber) ? json_encode($request->donaturbukber): NULL,
                'warga_jabur'     => ($request->donaturjabur) ? json_encode($request->donaturjabur) : NULL,
                'keterangan'      => $request->keterangan,
            ])->id;
            if (!is_null($donaturTakjil)) {
                foreach ($donaturTakjil as $data) {
                    DB::table('takjil_warga')->insert([
                        'konsumsi_id' => $konsumsiId,
                        'warga_id' => $data
                    ]);
                }
            }
            if (!is_null($donaturJabur)) {
                foreach ($donaturJabur as $data) {
                    DB::table('jabur_warga')->insert([
                        'konsumsi_id' => $konsumsiId,
                        'warga_id' => $data
                    ]);
                }
            }
            if (!is_null($donaturBukber)) {
                foreach ($donaturBukber as $data) {
                    DB::table('bukber_warga')->insert([
                        'konsumsi_id' => $konsumsiId,
                        'warga_id' => $data
                    ]);
                }
            }
        } catch (\Throwable $th) {
            DB::rollBack();
        }
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
        $selectedBukber = [];
        $selectedTakjil = [];
        $selectedJabur = [];
        $takjil = Konsumsi::with('takjils')->where('id', $konsumsi->id)->get();
        $bukber = Konsumsi::with('bukbers')->where('id', $konsumsi->id)->get();
        $jabur = Konsumsi::with('jaburs')->where('id', $konsumsi->id)->get();

        foreach ($takjil as $data) {
            foreach ($data->takjils()->get() as $key => $value) {
                array_push($selectedTakjil, $value->id);
            }
        }
        foreach ($jabur as $data) {
            foreach ($data->jaburs()->get() as $key => $value) {
                array_push($selectedJabur, $value->id);
            }
        }
        foreach ($bukber as $data) {
            foreach ($data->bukbers()->get() as $key => $value) {
                array_push($selectedBukber, $value->id);
            }
        }
        return view('admin.konsumsi.edit', [
            'konsumsi' => $konsumsi,
            'warga' => Warga::all(),
            'selectedBukber' => $selectedBukber,
            'selectedTakjil' => $selectedTakjil,
            'selectedJabur' => $selectedJabur,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Konsumsi $konsumsi)
    {
        $donaturBukber = $request->donaturbukber;
        $donaturTakjil = $request->donaturtakjil;
        $donaturJabur = $request->donaturjabur;
        try {
            Konsumsi::where('id', $konsumsi->id)->update([
                'tgl_kegiatan'    => $request->tanggal,
                'warga_takjil'    => empty($request->donaturtakjil) ? $konsumsi->warga_takjil : json_encode($request->donaturtakjil),
                'warga_jabur'  => empty($request->donaturjabur) ? $konsumsi->warga_jabur : json_encode($request->donaturjabur),
                'warga_bukber'  => empty($request->donaturbukber) ? $konsumsi->warga_bukber : json_encode($request->donaturbukber),
                'keterangan'      => $request->keterangan,
            ]);
            $konsumsi->takjils()->sync($donaturTakjil);
            $konsumsi->jaburs()->sync($donaturJabur);
            $konsumsi->bukbers()->sync($donaturBukber);
        } catch (\Throwable $th) {
            //throw $th;
        }
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
