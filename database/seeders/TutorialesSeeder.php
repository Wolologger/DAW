<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Tutorial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TutorialesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tutoriales = Tutorial::factory(10)->create();
        foreach ($tutoriales as $tutorial) {
            Image::factory(1)->create([
                'imageable_id' => $tutorial->id,
                // 'imageable_type' => Tutorial::class
                'imageable_type' => "Tutorial"

            ]);
        }
    }
}
