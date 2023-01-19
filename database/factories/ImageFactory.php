<?php

namespace Database\Factories;

use App\Models\Image as ModelsImage;
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
            'url' => $this->faker->imageUrl(width: 650, height:350)
        ];
    }

    public function user()
    {
        return $this->state(function (array $attributes) {
            return [
                'url' => $this->faker->imageUrl(width: 220, height:220),
            ];
        });
    }

}
