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
            'email' => 'acmbratang09@gmail.com',
            'password' => bcrypt('123')
        ]);
        User::create([
            'name' => 'mimin',
            'email' => 'ynh025@gmail.com',
            'password' => bcrypt('456')
        ]);
        User::create([
            'name' => 'deden',
            'email' => 'dedenfirm@gmail.com',
            'password' => bcrypt('789')
        ]);

        //kategori
        kategori::create([
            'namaKategori' => 'indoor'
        ]);
        kategori::create([
            'namaKategori' => 'outdoor'
        ]);
        kategori::create([
            'namaKategori' => 'UV'
        ]);
        kategori::create([
            'namaKategori' => 'A3'
        ]);

        //produk
        produk::create([
            'namaProduk' => 'mug',
            'harga' => '25000',
            'deskripsi' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,'
        ]);
        produk::create([
            'namaProduk' => 'XBanner',
            'harga' => '48000',
            'deskripsi' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,'
        ]);
    }
}
