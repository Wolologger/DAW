<?php

namespace Database\Seeders;

use App\Models\Grupo;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GruposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $grupos = Grupo::factory(12)->create();

        foreach ($grupos as $grupo) {
            Image::factory(1)->create([
                'imageable_id' => $grupo->id,
                'imageable_type' => Grupo::class
                // 'imageable_type' => 'Grupo'

            ]);
        }
    }
}
