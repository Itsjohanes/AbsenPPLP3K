<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\KepalaSekolah;
use App\Models\GuruPPL;
use App\Models\GuruPPLAbsen;
use App\Models\GuruP3K;
use App\Models\GuruP3KAbsen;

class HomeController extends Controller
{
    public function index()
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');

        $admin = Admin::count();
        $guru_ppl = GuruPPL::count();
        $guru_p3k = GuruP3K::count();

        // menghitung guru2 yang sudah hadir hari ini
        $p3k_absen = GuruP3KAbsen::where('tgl', $tanggal)->count();
        $ppl_absen = GuruPPLAbsen::where('tgl', $tanggal)->count();

        $detail_p3k = GuruP3KAbsen::where('tgl', $tanggal)->get();
        $detail_ppl = GuruPPLAbsen::where('tgl', $tanggal)->get();

        $persen_p3k = ((GuruP3KAbsen::where('tgl', $tanggal)->count()) / (GuruP3K::count())) * 100;
        $persen_ppl = ((GuruPPLAbsen::where('tgl', $tanggal)->count()) / (GuruPPL::count())) * 100;

        return view('pages.home', compact('admin', 'guru_ppl', 'guru_p3k', 'p3k_absen', 'ppl_absen', 'detail_p3k', 'detail_ppl', 'tanggal', 'persen_p3k', 'persen_ppl'));
    }
}
