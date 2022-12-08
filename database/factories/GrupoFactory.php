<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Provider\es_ES\Address;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GrupoFactory extends Factory
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
            'body' => $this->faker->text(500),

            'contact' => fake()->unique()->safeEmail(),

            'city' => $this->faker->city(),
            'state' => Address::state(),
            // 'country' => $this->faker->country(),

            'status' => $this->faker->randomElement([1,2]),
            'user_id' => User::all()->random()->id

        ];
    }
}
