<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruPPL;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Validator;
use Illuminate\Validation\Rule;

class GuruPPLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Ready to use

        $guru_ppl = GuruPPL::with('user')->get();

        return view('pages.guru-ppl.index', compact('guru_ppl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Ready to use

        return view('pages.guru-ppl.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'                    => 'required',
            'password'                => 'required|min:8|same:konfirmasi_password',
            'konfirmasi_password'     => 'required|min:8',
            'email'                   => 'required|email|unique:users',
            'nim'                     => 'required|numeric|unique:guru_ppl',
            'no_hp'                   => 'required|numeric',
            'alamat'                  => 'required'
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
            'name' => $request->name,
            'email' => $request->email,
            'level' => 'guru_ppl',
            'password' => $request->password,
        ]);

        $input = $request->except(['name', 'email', 'password', 'konfirmasi_password']);

        GuruPPL::create(array_merge($input, ['id_user' => $user->id]));

        Alert::success('Berhasil', 'Guru PPLSP Berhasil Ditambahkan');

        return redirect('/guru-ppl');
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

        $guru_ppl = GuruPPL::find($id);

        return view('pages.guru-ppl.edit', compact('guru_ppl'));
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
        $rules = [
            'name'                  => 'required',
            'password'              => 'required|min:8|same:konfirmasi_password',
            'konfirmasi_password'   => 'required|min:8',
            'email'                 => 'required|email|', Rule::unique('users')->ignore($id),
            'nim'                   => 'required|numeric|', Rule::unique('guru_ppl')->ignore($id),
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

        $guru_PPL = GuruPPL::find($id);
        $guru_PPL->nim = $request->nim;
        $guru_PPL->no_hp = $request->no_hp;
        $guru_PPL->alamat = $request->alamat;
        $guru_PPL->save();

        $user = User::find($guru_PPL->id_user);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        Alert::success('Berhasil', 'Guru PPLSP berhasil diubah');

        return redirect('/guru-ppl');
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

        $guru_PPL = GuruPPL::find($id);
        if ($guru_PPL->guru_ppl_absen()->count()) {
            Alert::error('Gagal', 'Guru PPLSP ini sudah memiliki riwayat absen');
            return redirect()->back();
        } else {
            $user = User::where('id', $guru_PPL->id_user)->delete();
            $guru_PPL->delete();

            Alert::success('Berhasil', 'Guru PPLSP berhasil dihapus');

            return redirect('/guru-ppl');
        }
    }
}
