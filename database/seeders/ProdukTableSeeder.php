<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('produks')->insert([
            'nama' => 'Durian Musang King',
            'deskripsi' => 'Musang King merupakan durian asal Malaysia yang pertama kali diperkenalkan pada tahun 1990. Durian ini juga memiliki nama lain yaitu Mao Shan Wang atau artinya Raja Kucing.',
            'gambar' => 'public/assets/img.durian.jpg',
            'harga' => 431000
        ]);

        DB::table('produks')->insert([
            'nama' => 'Durian Merah',
            'deskripsi' => 'Tabelak merupakan buah khas kalimantan yang banyak terdapat di pedalaman Kalimantan, Indonesia. Bentuk pohonnya serupa dengan pohon duriaan pada umumnya dengan tinggi batang bisa mencapai 25-30 meter..',
            'gambar' => 'public/assets/img.durian.jpg',
            'harga' => 395000
        ]);

        DB::table('produks')->insert([
            'nama' => 'Durian Montong',
            'deskripsi' => 'Durian adalah nama tumbuhan tropis yang berasal dari wilayah Asia Tenggara, sekaligus nama buahnya yang bisa dimakan.',
            'gambar' => 'public/assets/img.durian.jpg',
            'harga' => 585000
        ]);
    }
}
