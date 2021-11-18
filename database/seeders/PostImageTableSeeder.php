<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Database\Seeder;

class PostImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        PostImage::truncate();

        $posts = Post::all();

        foreach ($posts as $key => $p) {
            # code...
            PostImage::create([
                'image' => "1632930493.jpg",
                'post_id' => "$p->id",
     
            ]);
            
        }
    }
}
