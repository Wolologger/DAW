<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // User::create([
        //     'name' => 'admin',
        //     'email' => 'yourbandmusic@outlook.com',
        //     'password' => bcrypt('942555865'),
        //     'admin' => true
        // ]);
        $users = User::factory(5)->create();
        foreach ($users as $user) {
            Image::factory(1)->create([
                'imageable_id' => $user->id,
                'imageable_type' => User::class
                // 'imageable_type' => "Tutorial"

            ]);
        }
    }
}
