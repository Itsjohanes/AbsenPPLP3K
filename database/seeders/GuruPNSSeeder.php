<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\GuruP3K;

class GuruPNSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Miftah Rizky Alamsyah';
        $user->level = 'guru_p3k';
        $user->email = 'miftahrizkyalamsyah@upi.edu';
        $user->password  = 'miftahmiftah';
        $user->save();

        $pns = new GuruP3K();
        $pns->id_user = $user->id;
        $pns->nim = '2004561';
        $pns->alamat = 'Batujajar';
        $pns->no_hp = '089634953186';
        $pns->save();
    }
}
