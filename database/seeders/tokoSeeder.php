<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class tokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('toko')->insert([
            'nama_toko'=>'Arthur Citra Media',
            'alamat_toko'=>'Jl.Bratang Binangun No.9 Surabaya',
            'whatsapp'=>'087858860888'
            // 'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
