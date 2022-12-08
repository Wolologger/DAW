<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tutoriales>
 */
class TutorialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $name = $this->faker->unique()->word(10);

        return [
            'name' => $name,
            'slug' => Str::slug($name),

            'type' => $this->faker->unique()->word(10),
            'body' => $this->faker->text(500),
            'extract' => $this->faker->text(50),

            'status' => 
            $this->faker->randomElement([1,2]),
            'user_id' => User::all()->random()->id

        ];
    }
}
