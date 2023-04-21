<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use App\Models\GuruPPL;
use App\Models\GuruPPLAbsen;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Koordinat;

use Carbon\Carbon;

class GuruPPLAbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru_PPL = GuruPPL::where('id_user', auth()->user()->id)->first();
        $data_absen = GuruPPLAbsen::where('id_guru_ppl', '=', $guru_PPL->id)->get();

        return view('pages.absen-ppl.index', compact('data_absen')); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guru_PPL = GuruPPL::where('id_user', auth()->user()->id)->first();

        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');


        // data koordinat sekolah
        $koord = Koordinat::where('id', 1)->first();

        $jarak = $this->distance($request->lat, $request->lng, $koord->latitude, $koord->longitude, "K"); // <-- dihitung menggunakan satuan kilometer


        $PPL_absen = GuruPPLAbsen::where('id_guru_ppl', '=', $guru_PPL->id)->where('tgl', '=', $tanggal)->first();

        if ($PPL_absen) {
            Alert::warning('Peringatan', 'Sudah melakukan absensi masuk');
            return redirect()->back();
        } else {
            // if ($jarak > 0.2) {
            // Alert::error('Gagal', 'Jarak anda jauh dari sekolah!');
            //return redirect()->back();
            //   } else {
            GuruPPLAbsen::create([
                'id_guru_ppl' => $guru_PPL->id,
                'tgl'         => $tanggal,
                'jam_masuk'   => $localtime
            ]);

            Alert::success('Berhasil', 'Berhasil melakukan absen masuk');
            return redirect('/absen-guru-ppl');
            //  }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function absenKeluar(Request $request)
    {
        $guru_PPL = GuruPPL::where('id_user', auth()->user()->id)->first();

        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');


        // data koordinat sekolah
        $koord = Koordinat::where('id', 1)->first();

        $jarak = $this->distance($request->lat, $request->lng, $koord->latitude, $koord->longitude, "K"); // <-- dihitung menggunakan satuan kilometer


        $PPL_absen = GuruPPLAbsen::where('id_guru_ppl', '=', $guru_PPL->id)->where('tgl', '=', $tanggal)->first();



        if ($PPL_absen) {
            $dt = [
                'jam_keluar' => $localtime,
                'jam_kerja' => date('H:i:s', strtotime($localtime) - strtotime($PPL_absen->jam_masuk))
            ];
            if ($PPL_absen->jam_keluar == "") {
                //  if ($jarak < 0.2) {
                $PPL_absen->update($dt);

                Alert::success('Berhasil', 'Sampai ketemu lagi besok :)');
                return redirect('/absen-guru-ppl');
                //    } else {
                // Alert::error('Gagal', 'Jarak anda jauh dari sekolah!');
                //return redirect()->back();
                // }
            } else {

                Alert::warning('Peringatan', 'Sudah melakukan absensi keluar');
                return redirect()->back();
            }
        } else {
            Alert::error('Gagal', 'Anda belum melakukan absensi masuk!');
            return redirect()->back();
        }
    }

    // menghitung jarak latitude dan longitude dari sekolah ke device absen
    public function distance($lat1, $lon1, $lat2, $lon2, $unit)
    {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        } else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);

            if ($unit == "K") {
                return ($miles * 1.609344);
            } else if ($unit == "N") {
                return ($miles * 0.8684);
            } else {
                return $miles;
            }
        }
    }
}
