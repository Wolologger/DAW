<?php

namespace Database\Factories;

use App\Models\Compraventa;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Provider\es_ES\Address;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Compraventa>
 */
class CompraventaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $brand = $this->faker->unique()->word(5);
        $model = $this->faker->unique()->word(5);

        

        return [
            //

            'brand' => $brand,
            'model' => $model,

            // 'slug' => Str::slug($brand+$model),
            'slug' => Str::slug($brand."_".$model),


            'type' => $this->faker->unique()->word(5),        
            'descripcion' => $this->faker->text(500),

            'price' => $this->faker->randomNumber(4, false),

            'state_product' =>$this->faker->randomElement(['Normal', 'Bueno', 'Muy bueno', 'Excelente']),

            'city' => $this->faker->city(),
            'state' => Address::state(),
            // 'country' => $this->faker->country(),

            'status' => $this->faker->randomElement([1,2]),
            'user_id' => User::all()->random()->id

        ];
    }
}
