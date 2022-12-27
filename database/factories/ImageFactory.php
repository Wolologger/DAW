<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            // 'url' => 'posts/' . $this->faker->image('public/storage/posts',640,480, null, false)
            // 'url' => 'posts/' .$this->faker->image('public/storage/posts', width: 620, height:480).'.jpg'
            'url' => $this->faker->imageUrl(width: 650, height:350)
            // 'url' => $this->faker->image('public/storage/img', 640, 480, null, true)
       
        ];


    }
}
