<?php

namespace Database\Seeders;

use App\Models\Compraventa;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompraventaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $compraventas = Compraventa::factory(12)->create();
        //    Compraventa::factory(12)->create();


        foreach ($compraventas as $compraventa) {
            Image::factory(1)->create([
                'imageable_id' => $compraventa->id,
                // 'imageable_type' => Compraventa::class
                'imageable_type' => "Compraventa"

            ]);
        }
    }
}
