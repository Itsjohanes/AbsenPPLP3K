<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\GuruPPL;

class GuruPTTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Asrila';
        $user->level = 'guru_ppl';
        $user->email = 'asrila@gmail.com';
        $user->password = 'asrila123';
        $user->save();
        $ptt = new GuruPPL();
        $ptt->id_user = $user->id;
        $ptt->nim = '747123912032013';
        $ptt->alamat = 'Pimpi';
        $ptt->no_hp = '085756219908';
        $ptt->save();
    }
}
