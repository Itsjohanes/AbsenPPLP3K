<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruP3KAbsen;
use App\Models\GuruPPLAbsen;

class LaporanAbsenController extends Controller
{
    public function laporanP3K()
    {
        return view('pages.laporan.laporan-p3k');
    }

    public function filterP3K($tglawal, $tglakhir)
    {
        $data1 = $tglawal;
        $data2 = $tglakhir;
        $absen_p3k = GuruP3KAbsen::whereBetween('tgl', [$tglawal, $tglakhir])->orderBy('tgl', 'ASC')->get();

        return view('pages.laporan.filter-p3k', compact('absen_p3k', 'data1', 'data2'));
    }

    public function laporanPPL()
    {
        return view('pages.laporan.laporan-ppl');
    }

    public function filterPPL($tglawal, $tglakhir)
    {
        $data1 = $tglawal;
        $data2 = $tglakhir;
        $absen_ppl = GuruPPLAbsen::whereBetween('tgl', [$tglawal, $tglakhir])->orderBy('tgl', 'ASC')->get();

        return view('pages.laporan.filter-ppl', compact('absen_ppl', 'data1', 'data2'));
    }

    public function cetakP3K($data1, $data2)
    {
        $tglawal = $data1;
        $tglakhir = $data2;

        $absen_p3k = GuruP3KAbsen::whereBetween('tgl', [$data1, $data2])->orderBy('tgl', 'ASC')->get();

        return view('pages.laporan.cetak-p3k', compact('absen_p3k', 'tglawal', 'tglakhir'));
    }

    public function cetakPPL($data1, $data2)
    {
        $tglawal = $data1;
        $tglakhir = $data2;

        $absen_ppl = GuruPPLAbsen::whereBetween('tgl', [$data1, $data2])->orderBy('tgl', 'ASC')->get();

        return view('pages.laporan.cetak-ppl', compact('absen_ppl', 'tglawal', 'tglakhir'));
    }
}
