<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Koordinat;

class KoordinatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $koord = new Koordinat;
        $koord->latitude = "-6.902180";
        $koord->longitude = "107.538713";
        $koord->save();
    }
}
