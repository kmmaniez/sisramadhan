<?php

namespace App\Http\Controllers;

use App\Models\JadwalAjar;
use App\Models\Konsumsi;
use App\Models\Tadarus;
use App\Models\Tarawih;
use App\Models\Ustadh;
use App\Models\Warga;
use GuzzleHttp\Psr7\Response;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Pest\Laravel\get;

class DashboardController extends Controller
{
    public function index()
    {
        // TPA
        $countUstad = JadwalAjar::select('id_ustadh')->groupBy('id_ustadh')->get();
        $jumlahustadh = [];
        $jumlahajar = [];
        foreach ($countUstad as $key => $value) {
            array_push($jumlahustadh, [
                $value->ustadh->nama,
            ]);
            array_push($jumlahajar, [
                static::countUstadhSchedule('tpa', $value->id_ustadh)
            ]);
        }
        $listustad = [
            'nama_ustadh' => collect($jumlahustadh),
            'total_ajar' => collect($jumlahajar),
        ];

        // KONSUMSI
        $dataWarga = Warga::all()->map(function ($data) {
            $countByTakjil = DB::table('konsumsi')->havingRaw('YEAR(tgl_kegiatan) = ?', [date('Y')])->whereJsonContains('warga_takjil', "$data->id")->get()->count();
            $countByJabur = DB::table('konsumsi')->havingRaw('YEAR(tgl_kegiatan) = ?', [date('Y')])->whereJsonContains('warga_jabur', "$data->id")->get()->count();
            $countByBukber = DB::table('konsumsi')->havingRaw('YEAR(tgl_kegiatan) = ?', [date('Y')])->whereJsonContains('warga_bukber', "$data->id")->get()->count();
            return [
                'warga' => $data->nama_alias,
                'takjil' => $countByTakjil,
                'jabur' => $countByJabur,
                'bukber' => $countByBukber,
                'total' => $countByTakjil + $countByJabur + $countByBukber,
            ];
        })->toArray();
        usort($dataWarga, function ($a, $b) {
            return $b['total'] <=> $a['total'];
        });
        $dataSortedKonsumsiNew = array();
        array_push($dataSortedKonsumsiNew, array_values($dataWarga));
        $getOnlyFourUsersKonsumsi = array(
            'list_warga'        => [],
            'jumlah_takjil'       => [],
            'jumlah_bukber' => [],
            'jumlah_jabur'      => [],
            'total' => []
        );
        foreach ($dataSortedKonsumsiNew[0] as $key => $value) {
            if ($key < 4) {
                array_push($getOnlyFourUsersKonsumsi['list_warga'], $value['warga']);
                array_push($getOnlyFourUsersKonsumsi['jumlah_takjil'], $value['takjil']);
                array_push($getOnlyFourUsersKonsumsi['jumlah_bukber'], $value['bukber']);
                array_push($getOnlyFourUsersKonsumsi['jumlah_jabur'], $value['jabur']);
                array_push($getOnlyFourUsersKonsumsi['total'], $value['total']);
            }
        }

        // TARAWIH
        $dataKontribusiWarga = Warga::all()->map(function ($data, $index) {
            $kontribusiImam         = Tarawih::select('*')->havingRaw('YEAR(tgl_kegiatan) = ?', [date('Y')])->where('id_imam', $data->id)->get()->count();
            $kontribusiPenceramah   = Tarawih::select('*')->havingRaw('YEAR(tgl_kegiatan) = ?', [date('Y')])->where('id_penceramah', $data->id)->get()->count();
            $kontribusiBilal        = Tarawih::select('*')->havingRaw('YEAR(tgl_kegiatan) = ?', [date('Y')])->where('id_bilal', $data->id)->get()->count();
            $jumlahKontribusi       = Tarawih::select('*')->havingRaw('YEAR(tgl_kegiatan) = ?', [date('Y')])->where('id_imam', $data->id)
                ->orWhere('id_penceramah', $data->id)
                ->orWhere('id_bilal', $data->id)
                ->count();
            return [
                'total_kontribusi'      => $jumlahKontribusi,
                'nama_warga'            => $data->nama_alias,
                'kontribusi_imam'       => $kontribusiImam,
                'kontribusi_penceramah' => $kontribusiPenceramah,
                'kontribusi_bilal'      => $kontribusiBilal,
            ];
        })->toArray();
        $dataSortedTarawihNew = array();
        array_push($dataSortedTarawihNew, array_values($dataKontribusiWarga));
        $getOnlyFourUsersTarawih = array(
            'list_warga'        => [],
            'jumlah_imam'       => [],
            'jumlah_penceramah' => [],
            'jumlah_bilal'      => [],
        );
        foreach ($dataSortedTarawihNew[0] as $key => $value) {
            if ($key < 4) {
                array_push($getOnlyFourUsersTarawih['list_warga'], $value['nama_warga']);
                array_push($getOnlyFourUsersTarawih['jumlah_imam'], $value['kontribusi_imam']);
                array_push($getOnlyFourUsersTarawih['jumlah_penceramah'], $value['kontribusi_penceramah']);
                array_push($getOnlyFourUsersTarawih['jumlah_bilal'], $value['kontribusi_bilal']);
            }
        }

        // KHATAMAN
        $tadarus = [
            'jumlah' => [],
            'listnama' => [],
        ];
        $namakelompok = Tadarus::select('*')
            ->havingRaw('YEAR(tahun_kegiatan) = ?', [date('Y')])
            ->get();
        foreach ($namakelompok as $key => $value) {
            array_push($tadarus['jumlah'], $value->jumlah_khatam);
            array_push($tadarus['listnama'], $value->nama_kelompok);
        }

        // Jumlah warga, bilal, imam, penceramah & wargaaktif
        $jumlahwarga = Warga::all()->where('status_keaktifan', 1)->count();
        $jumlahbilal = DB::table('tarawih')->selectRaw('COUNT(DISTINCT(id_bilal)) as jumlahbilal')->get();
        $jumlahimam = DB::table('tarawih')->selectRaw('COUNT(DISTINCT(id_imam)) as jumlahimam')->get();
        $jumlahpenceramah = DB::table('tarawih')->selectRaw('COUNT(DISTINCT(id_penceramah)) as jumlahpenceramah')->get();
        return view('admin.dashboard.index', compact('tadarus', 'getOnlyFourUsersTarawih', 'getOnlyFourUsersKonsumsi', 'listustad', 'jumlahwarga', 'jumlahbilal', 'jumlahpenceramah', 'jumlahimam'));
    }
    public function tpa(Request $request)
    {
        $countUstad = JadwalAjar::select('id_ustadh')->groupBy('id_ustadh')->get();
        $jumlahustadh = [];
        $jumlahajar = [];
        foreach ($countUstad as $key => $value) {
            array_push($jumlahustadh, [
                $value->ustadh->nama,
            ]);
            array_push($jumlahajar, [
                static::countUstadhSchedule('tpa', $value->id_ustadh)
            ]);
        }
        $namakelompok = JadwalAjar::all()->pluck('id_ustadh');
        $listustad = [
            'nama_ustadh' => collect($jumlahustadh),
            'total_ajar' => collect($jumlahajar),
        ];
        return view('admin.dashboard.dashtpa', compact('namakelompok', 'listustad'));
    }

    public function konsumsi()
    {
        $dataWarga = Warga::all()->map(function ($data) {
            // dump($data);
            $countByTakjil = DB::table('konsumsi')->havingRaw('YEAR(tgl_kegiatan) = ?', [date('Y')])->whereJsonContains('warga_takjil', "$data->id")->get()->count();
            $countByJabur = DB::table('konsumsi')->havingRaw('YEAR(tgl_kegiatan) = ?', [date('Y')])->whereJsonContains('warga_jabur', "$data->id")->get()->count();
            $countByBukber = DB::table('konsumsi')->havingRaw('YEAR(tgl_kegiatan) = ?', [date('Y')])->whereJsonContains('warga_bukber', "$data->id")->get()->count();
            // echo "$data->nama_alias [ JIL <strong>$countByTakjil</strong> - BER <strong>$countByBukber</strong>- BUR <strong>$countByJabur</strong> total ".$countByTakjil + $countByJabur + $countByBukber."]<br>";
            // $zz = Konsumsi::where(DB::raw('YEAR(tgl_kegiatan)'),2023)->get();
            // echo $countByTakjil;
            return [
                'warga' => $data->nama_alias,
                'takjil' => $countByTakjil,
                'jabur' => $countByJabur,
                'bukber' => $countByBukber,
                'total' => $countByTakjil + $countByJabur + $countByBukber,
            ];
        })->toArray();
        usort($dataWarga, function ($a, $b) {
            return $b['total'] <=> $a['total'];
        });
        // arsort($dataWarga);
        $dataSortedNew = array();
        array_push($dataSortedNew, array_values($dataWarga));
        $getOnlyFourUsers = array(
            'list_warga'        => [],
            'jumlah_takjil'       => [],
            'jumlah_bukber' => [],
            'jumlah_jabur'      => [],
            'total' => []
        );
        foreach ($dataSortedNew[0] as $key => $value) {
            if ($key < 4) {
                array_push($getOnlyFourUsers['list_warga'], $value['warga']);
                array_push($getOnlyFourUsers['jumlah_takjil'], $value['takjil']);
                array_push($getOnlyFourUsers['jumlah_bukber'], $value['bukber']);
                array_push($getOnlyFourUsers['jumlah_jabur'], $value['jabur']);
                array_push($getOnlyFourUsers['total'], $value['total']);
            }
        }
        // dump($getOnlyFourUsers);
        return view('admin.dashboard.dashkonsumsi', compact('getOnlyFourUsers'));
    }

    public function filterKonsumsiByYears(Request $request)
    {
        if ($request->year) {
            $dataWarga = Warga::all()->map(function ($data) use ($request) {
                $countByTakjil = DB::table('konsumsi')->havingRaw('YEAR(tgl_kegiatan) = ?', [$request->year])->whereJsonContains('warga_takjil', $data->nama_alias)->get()->count();
                $countByJabur = DB::table('konsumsi')->havingRaw('YEAR(tgl_kegiatan) = ?', [$request->year])->whereJsonContains('warga_jabur', $data->nama_alias)->get()->count();
                $countByBukber = DB::table('konsumsi')->havingRaw('YEAR(tgl_kegiatan) = ?', [$request->year])->whereJsonContains('warga_bukber', $data->nama_alias)->get()->count();
                return [
                    'bukber' => $countByBukber,
                    'takjil' => $countByTakjil,
                    'warga' => $data->nama_alias,
                    'jabur' => $countByJabur,
                    'bukber' => $countByBukber,
                ];
            })->toArray();
            arsort($dataWarga);
            $dataSortedNew = array();
            array_push($dataSortedNew, array_values($dataWarga));
            $getOnlyFourUsers = array(
                'list_warga'        => [],
                'jumlah_takjil'       => [],
                'jumlah_bukber' => [],
                'jumlah_jabur'      => [],
            );
            foreach ($dataSortedNew[0] as $key => $value) {
                if ($key < 4) {
                    array_push($getOnlyFourUsers['list_warga'], $value['warga']);
                    array_push($getOnlyFourUsers['jumlah_takjil'], $value['takjil']);
                    array_push($getOnlyFourUsers['jumlah_bukber'], $value['bukber']);
                    array_push($getOnlyFourUsers['jumlah_jabur'], $value['jabur']);
                }
            }
            return response()->json([
                'status' => 'success',
                'data' => $getOnlyFourUsers,
            ]);
        }
    }

    public function tarawih()
    {
        $dataKontribusiWarga = Warga::all()->whereNotNull('kontribusi')->map(function ($data) {
            $kontribusiImam         = Tarawih::select('*')->havingRaw('YEAR(tgl_kegiatan) = ?', [date('Y')])->where('id_imam', $data->id)->get()->count();
            $kontribusiPenceramah   = Tarawih::select('*')->havingRaw('YEAR(tgl_kegiatan) = ?', [date('Y')])->where('id_penceramah', $data->id)->get()->count();
            $kontribusiBilal        = Tarawih::select('*')->havingRaw('YEAR(tgl_kegiatan) = ?', [date('Y')])->where('id_bilal', $data->id)->get()->count();
            $jumlahKontribusi       = Tarawih::select('*')->havingRaw('YEAR(tgl_kegiatan) = ?', [date('Y')])->where('id_imam', $data->id)
                ->orWhere('id_penceramah', $data->id)
                ->orWhere('id_bilal', $data->id)
                ->count();
            return [
                'total_kontribusi'      => $jumlahKontribusi,
                'nama_warga'            => $data->nama_alias,
                'kontribusi_imam'       => $kontribusiImam,
                'kontribusi_penceramah' => $kontribusiPenceramah,
                'kontribusi_bilal'      => $kontribusiBilal,
            ];
        })->toArray();
        // $dataKontribusiWarga = Warga::all()->map(function ($data, $index) {
        //     $kontribusiImam         = Tarawih::select('*')->havingRaw('YEAR(tgl_kegiatan) = ?', [date('Y')])->where('id_imam', $data->id)->get()->count();
        //     $kontribusiPenceramah   = Tarawih::select('*')->havingRaw('YEAR(tgl_kegiatan) = ?', [date('Y')])->where('id_penceramah', $data->id)->get()->count();
        //     $kontribusiBilal        = Tarawih::select('*')->havingRaw('YEAR(tgl_kegiatan) = ?', [date('Y')])->where('id_bilal', $data->id)->get()->count();
        //     $jumlahKontribusi       = Tarawih::select('*')->havingRaw('YEAR(tgl_kegiatan) = ?', [date('Y')])->where('id_imam', $data->id)
        //         ->orWhere('id_penceramah', $data->id)
        //         ->orWhere('id_bilal', $data->id)
        //         ->count();
        //     return [
        //         'total_kontribusi'      => $jumlahKontribusi,
        //         'nama_warga'            => $data->nama_alias,
        //         'kontribusi_imam'       => $kontribusiImam,
        //         'kontribusi_penceramah' => $kontribusiPenceramah,
        //         'kontribusi_bilal'      => $kontribusiBilal,
        //     ];
        // })->toArray();
        $dataSortedNew = array();
        array_push($dataSortedNew, array_values($dataKontribusiWarga));
        $getOnlyFourUsers = array(
            'list_warga'        => [],
            'jumlah_imam'       => [],
            'jumlah_penceramah' => [],
            'jumlah_bilal'      => [],
        );
        foreach ($dataSortedNew[0] as $key => $value) {
            if ($key < 4) {
                array_push($getOnlyFourUsers['list_warga'], $value['nama_warga']);
                array_push($getOnlyFourUsers['jumlah_imam'], $value['kontribusi_imam']);
                array_push($getOnlyFourUsers['jumlah_penceramah'], $value['kontribusi_penceramah']);
                array_push($getOnlyFourUsers['jumlah_bilal'], $value['kontribusi_bilal']);
            }
        }

        return view('admin.dashboard.dashtarawih', compact('getOnlyFourUsers'));
    }
    public function filterTarawihByYears(Request $request)
    {
        if ($request->year) {
            $dataKontribusiWarga = Warga::all()->map(function ($data, $index) use ($request) {
                $kontribusiImam         = Tarawih::select('*')->havingRaw('YEAR(tgl_kegiatan) = ?', [$request->year])->where('id_imam', $data->id)->get()->count();
                $kontribusiPenceramah   = Tarawih::select('*')->havingRaw('YEAR(tgl_kegiatan) = ?', [$request->year])->where('id_penceramah', $data->id)->get()->count();
                $kontribusiBilal        = Tarawih::select('*')->havingRaw('YEAR(tgl_kegiatan) = ?', [$request->year])->where('id_bilal', $data->id)->get()->count();
                $jumlahKontribusi       = Tarawih::select('*')->havingRaw('YEAR(tgl_kegiatan) = ?', [$request->year])->where('id_imam', $data->id)
                    ->orWhere('id_penceramah', $data->id)
                    ->orWhere('id_bilal', $data->id)
                    ->count();
                return [
                    'total_kontribusi'      => $jumlahKontribusi,
                    'nama_warga'            => $data->nama_alias,
                    'kontribusi_imam'       => $kontribusiImam,
                    'kontribusi_penceramah' => $kontribusiPenceramah,
                    'kontribusi_bilal'      => $kontribusiBilal,
                ];
            })->toArray();
            // die;
            arsort($dataKontribusiWarga);
            $dataSortedNew = array();
            array_push($dataSortedNew, array_values($dataKontribusiWarga));
            $getOnlyFourUsers = array(
                'list_warga'        => [],
                'jumlah_imam'       => [],
                'jumlah_penceramah' => [],
                'jumlah_bilal'      => [],
            );
            foreach ($dataSortedNew[0] as $key => $value) {
                if ($key < 4) {
                    array_push($getOnlyFourUsers['list_warga'], $value['nama_warga']);
                    array_push($getOnlyFourUsers['jumlah_imam'], $value['kontribusi_imam']);
                    array_push($getOnlyFourUsers['jumlah_penceramah'], $value['kontribusi_penceramah']);
                    array_push($getOnlyFourUsers['jumlah_bilal'], $value['kontribusi_bilal']);
                }
            }

            return response()->json([
                'status' => 'success',
                'data' => $getOnlyFourUsers,
            ]);
        }
    }

    public function tadarus(Request $request)
    {
        $tadarus = [
            'jumlah' => [],
            'listnama' => [],
        ];
        $namakelompok = Tadarus::select('*')
            ->havingRaw('YEAR(tahun_kegiatan) = ?', [date('Y')])
            ->get();
        foreach ($namakelompok as $key => $value) {
            array_push($tadarus['jumlah'], $value->jumlah_khatam);
            array_push($tadarus['listnama'], $value->nama_kelompok);
        }

        return view('admin.dashboard.dashtadarus', compact('namakelompok', 'tadarus'));
    }

    public function filterTadarusByYears(Request $request)
    {
        if ($request->year) {
            // $data = DB::select("SELECT * FROM `tadarus` WHERE YEAR(tahun_kegiatan)='$request->year'");
            $ea  = Tadarus::select('*')
                ->havingRaw('YEAR(tahun_kegiatan) = ?', [$request->year])
                ->get();
            return response()->json([
                'status' => 'ada',
                'data' => $ea,
            ]);
        }
    }


    public function countUstadhSchedule($table, $id)
    {
        switch ($table) {
            case 'tpa':
                $result = JadwalAjar::select('id_ustadh')->where('id_ustadh', '=', $id)->count();
                break;
            case 'tadarus':
                $result = JadwalAjar::select('id_ustadh')->where('id_ustadh', '=', $id)->count();
                break;
            default:
                # code...
                break;
        }
        //    $result = JadwalAjar::select('id_ustadh')->where('id_ustadh','=',$id)->count();
        return $result;
    }
}
