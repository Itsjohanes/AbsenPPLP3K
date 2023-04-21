<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruP3K;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Validator;
use Illuminate\Validation\Rule;

class GuruP3KController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Ready to use

        $guru_p3k = GuruP3K::with('user')->get();

        return view('pages.guru-p3k.index', compact('guru_p3k'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Ready to use

        return view('pages.guru-p3k.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Ready to use

        $rules = [
            'name'                  => 'required',
            'password'              => 'required|min:8|same:konfirmasi_password',
            'konfirmasi_password'   => 'required|min:8',
            'email'                 => 'required|email|unique:users',
            'nim'                   => 'required|numeric|unique:guru_p3k',
            'no_hp'                 => 'required|numeric',
            'alamat'                => 'required'
        ];


        $messages = [
            'name.required'                 => 'Nama wajib diisi',
            'password.required'             => 'Password wajib diisi',
            'password.min'                  => 'Password minimal 8 karakter',
            'password.same'                 => 'Konfirmasi password harus sama dengan password',
            'konfirmasi_password.required'  => 'Konfirmasi password wajib diisi',
            'konfirmasi_password.min'       => 'Konfirmasi password minimal 8 karakter',
            'email.required'                => 'Email wajib diisi',
            'email.email'                   => 'Email tidak valid',
            'email.unique'                  => 'Email sudah terdaftar',
            'nim.required'                  => 'NIM wajib diisi',
            'nim.unique'                    => 'NIM sudah terdaftar',
            'no_hp.required'                => 'Nomor handphone wajib diisi',
            'no_hp.numeric'                 => 'Nomor handphone harus berupa angka',
            'alamat.required'               => 'Alamat wajib diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $user = User::create([
            //Ready to use

            'name' => $request->name,
            'email' => $request->email,
            'level' => 'guru_p3k',
            'password' => $request->password,
        ]);

        $input = $request->except(['name', 'email', 'password', 'konfirmasi_password']);

        Gurup3k::create(array_merge($input, ['id_user' => $user->id]));

        Alert::success('Berhasil', 'Guru P3K Berhasil Ditambahkan');

        return redirect('/guru-p3k');
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
        //Ready to use

        $guru_p3k = GuruP3K::find($id);

        return view('pages.guru-p3k.edit', compact('guru_p3k'));
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
        //Ready to use

        $guru_p3k = GuruP3K::find($id);

        $rules = [
            'name'                  => 'required',
            'password'              => 'required|min:8|same:konfirmasi_password',
            'konfirmasi_password'   => 'required|min:8',
            'email'                 => 'required|email|', Rule::unique('users')->ignore($id),
            'nim'                   => 'required|numeric|', Rule::unique('guru_p3k')->ignore($id),
            'no_hp'                 => 'required|numeric',
            'alamat'                => 'required'
        ];


        $messages = [
            'name.required'                 => 'Nama wajib diisi',
            'password.required'             => 'Password wajib diisi',
            'password.min'                  => 'Password minimal 8 karakter',
            'password.same'                 => 'Konfirmasi password harus sama dengan password',
            'konfirmasi_password.required'  => 'Konfirmasi password wajib diisi',
            'konfirmasi_password.min'       => 'Konfirmasi password minimal 8 karakter',
            'email.required'                => 'Email wajib diisi',
            'email.email'                   => 'Email tidak valid',
            'email.unique'                  => 'Email sudah terdaftar',
            'nim.required'                  => 'NIM wajib diisi',
            'nim.numeric'                   => 'NIM harus berupa angka',
            'nim.unique'                    => 'NIM sudah terdaftar',
            'no_hp.required'                => 'Nomor handphone wajib diisi',
            'no_hp.numeric'                 => 'Nomor handphone harus berupa angka',
            'alamat.required'               => 'Alamat wajib diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }


        $guru_p3k->nim = $request->nim;
        $guru_p3k->no_hp = $request->no_hp;
        $guru_p3k->alamat = $request->alamat;
        $guru_p3k->save();

        $user = User::find($guru_p3k->id_user);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        Alert::success('Berhasil', 'Guru P3K berhasil diubah');

        return redirect('/guru-p3k');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Ready to use

        $guru_p3k = GuruP3K::find($id);
        if ($guru_p3k->guru_p3k_absen()->count()) {
            Alert::error('Gagal', 'Guru P3K ini sudah memiliki riwayat absen');
            return redirect()->back();
        } else {
            $user = User::where('id', $guru_p3k->id_user)->delete();
            $guru_p3k->delete();

            Alert::success('Berhasil', 'Guru P3K berhasil dihapus');

            return redirect('/guru-p3k');
        }
    }
}
