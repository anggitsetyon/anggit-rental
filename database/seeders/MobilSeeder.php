<?php

namespace Database\Seeders;

use App\Models\Mobil;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = ['Mini', 'SUV', 'Standar', 'Mobil Keluarga'];
        $merk = ['Toyota', 'Honda', 'Hyundai', 'Suzuki', 'Nissan', 'Mitsubishi'];
        $harga = ['200000', '250000', '300000'];
        for($i = 0; $i < 12; $i++){
            Mobil::create([
                'nama_mobil' => rand(),
                'kategori' => $kategori[rand(0, 3)],
                'merk' => $merk[rand(0, 5)],
                'stok' => rand(3, 8),
                'harga' => $harga[rand(0, 2)],
                'gambar' => 'images/car-'. $i + 1 .'.jpg',
                'deskripsi' => 'Deskripsi'
            ]);
        }
    }
}
