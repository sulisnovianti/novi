<?php

use Illuminate\Database\Seeder;
use App\jenis;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis = new jenis();
        $jenis->nama = "Laboratorium";
        $jenis->save();

        $jenis1 = new jenis();
        $jenis1->nama = "Bengkel";
        $jenis1->save();
    }
}
