<?php

namespace App\Http\Controllers;

use App\Models\JadwalAjar;
use App\Models\Khataman;
use App\Models\Konsumsi;
use App\Models\Sholatied;
use App\Models\Tadarus;
use App\Models\Takbiran;
use App\Models\Tarawih;
use App\Models\Zakat;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $title  = 'Halaman Informasi';
        return view('index', compact('title'));
    }
    
    public function tpaIndex()
    {
        $title  = 'Halaman TPA';
        $tpa    = JadwalAjar::all();

        return view('tpa', compact('title', 'tpa'));
    }

    public function konsumsiIndex()
    {
        $title  = 'Halaman Konsumsi';
        $konsumsi  = Konsumsi::all();

        return view('konsumsi', compact('title', 'konsumsi'));
    }

    public function tarawihIndex()
    {
        $title  = 'Halaman Tarawih';
        $tarawih  = Tarawih::all();

        return view('tarawih', compact('title', 'tarawih'));
    }

    public function tadarusIndex()
    {
        $title  = 'Halaman Tadarus';
        $tadarus  = Tadarus::all();

        return view('tadarus', compact('title','tadarus'));
    }

    public function khatamanIndex()
    {
        $title  = 'Khataman Khataman';
        $khataman = Khataman::all();

        return view('khataman', compact('title', 'khataman'));
    }

    public function zakatIndex()
    {
        $title  = 'Halaman Zakat';
        $zakat  = Zakat::all();

        return view('zakat', compact('title', 'zakat'));
    }

    public function takbiranIndex()
    {
        $title  = 'Halaman Takbiran';
        $takbiran = Takbiran::all();

        return view('takbiran', compact('title','takbiran'));
    }

    public function sholatiedIndex()
    {
        $title  = 'Halaman Sholatied';
        $sholatied = Sholatied::all();

        return view('sholatied', compact('title','sholatied'));
    }
}
