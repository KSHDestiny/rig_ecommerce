<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banner1 = new Banner();
        $banner1->image = 'Banner1.jpg';
        $banner1->save();

        $banner2 = new Banner();
        $banner2->image = 'Banner2.webp';
        $banner2->save();

        $banner3 = new Banner();
        $banner3->image = 'Banner3.jpg';
        $banner3->save();

        $banner4 = new Banner();
        $banner4->image = 'Banner4.jpg';
        $banner4->save();

        $banner5 = new Banner();
        $banner5->image = 'Banner5.jpg';
        $banner5->save();

    }
}
