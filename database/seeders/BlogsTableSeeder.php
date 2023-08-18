<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(public_path() . '/files/blogs.json');
        $objs = json_decode($json);
        foreach($objs as $obj){
            DB::table('blogs')->insert([
                'title'      => $obj->title,
                'content'    => $obj->content,
                'created_at' => $obj->created_at,
            ]);
        }
    }
}
