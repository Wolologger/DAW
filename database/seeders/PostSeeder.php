<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Coments;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $posts = Post::factory(20)->create();

       foreach ($posts as $post) {
            Coments::factory(3)->create();
            Image::factory(1)->create([
                'imageable_id' => $post->id,
                // 'imageable_type' => Post::class
                'imageable_type' => "Post"

            ]);

            $post->tags()->attach([
                rand(1,4),
                rand(5,8)
            ]);
       }
    }
}
