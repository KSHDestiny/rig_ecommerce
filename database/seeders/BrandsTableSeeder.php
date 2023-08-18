<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brand1 = new Brand();
        $brand1->name = 'Lenovo';
        $brand1->slug = 'lenovo';
        $brand1->image = "Lenovo.png";
        $brand1->save();

        $brand2 = new Brand();
        $brand2->name = 'ASUS';
        $brand2->slug = 'asus';
        $brand2->image = "ASUS.png";
        $brand2->save();

        $brand3 = new Brand();
        $brand3->name = 'ACER';
        $brand3->slug = 'acer';
        $brand3->image = "Acer.png";
        $brand3->save();

        $brand4 = new Brand();
        $brand4->name = 'DELL';
        $brand4->slug = 'dell';
        $brand4->image = "DELL.png";
        $brand4->save();

        $brand5 = new Brand();
        $brand5->name = 'MSI';
        $brand5->slug = 'msi';
        $brand5->image = "MSI.png";
        $brand5->save();
    }
}
