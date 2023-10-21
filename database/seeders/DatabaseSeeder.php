<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\produk;
use App\Models\kategori;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        //user
        User::create([
            'name' => 'arthur',
            'whatsapp' => '087858860888',
            'email' => 'acmbratang09@gmail.com',
            'password' => bcrypt('123')
        ]);
        User::create([
            'name' => 'mimin',
            'whatsapp' => '085872755356',
            'email' => 'ynh025@gmail.com',
            'password' => bcrypt('456')
        ]);
        User::create([
            'name' => 'deden',
            'whatsapp' => '085736692227',
            'email' => 'dedenfirm@gmail.com',
            'password' => bcrypt('789')
        ]);

        // kategori
        kategori::create([
            'idKategori' => '1',
            'namaKategori' => 'indoor'
        ]);
        kategori::create([
            'idKategori' => '2',
            'namaKategori' => 'outdoor'
        ]);
        kategori::create([
            'idKategori' => '3',
            'namaKategori' => 'UV'
        ]);
        kategori::create([
            'idKategori' => '4',
            'namaKategori' => 'A3'
        ]);

        //produk

        produk::create([
            'namaProduk' => 'mug',
            'harga' => '25000',
            'deskripsi' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,',
            'idKategori' => '3',
        ]);
        produk::create([
            'namaProduk' => 'XBanner Vynil 280gr',
            'harga' => '48000',
            'deskripsi' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,',
            'idKategori' => '2',
        ]);
    }
}
