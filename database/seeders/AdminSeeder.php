<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Administrator';
        $user->level = 'admin';
        $user->email = 'miftahrizkyalamsyah@protonmail.com';
        $user->password = 'miftahrizkyalamsyah@gmail.com';
        $user->save();

        $admin = new Admin();
        $admin->id_user = $user->id;
        $admin->nim = '2004561';
        $admin->alamat = 'Batujajar Bandung Barat';
        $admin->no_hp = '089643953186';
        $admin->save();
    }
}
