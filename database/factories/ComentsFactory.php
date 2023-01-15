<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coments>
 */
class ComentsFactory extends Factory
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
            'descripcion' => $this->faker->text(2000),
            // 'status' => $this->faker->randomElement([1,2]),
            'user_id' => User::all()->random()->id,
            'post_id' => Post::all()->random()->id,
            
        ];
    }
}
