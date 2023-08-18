<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(public_path() . '/files/products.json');
        $objs = json_decode($json);
        foreach($objs as $obj){
            DB::table('products')->insert([
                'category_id' => $obj->category_id,
                'brand_id'    => $obj->brand_id,
                'name'        => $obj->name,
                'summary'     => $obj->summary,
                'description' => $obj->description,
                'price'       => $obj->price,
                'image'       => $obj->image,
                'created_at'  => $obj->created_at,
            ]);
        }
    }
}
