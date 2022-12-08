<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Compraventa;
use App\Models\Grupo;
use App\Models\Tag;
use App\Models\Tutorial;
use Illuminate\Database\Seeder;

// creamos la carpeta posts para guardar las imagenes
Use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
            // creando carpeta en la ruta C:\xampp\htdocs\dashboard\DAW\storage\app\public
            // previamente he tenido que aplicar el comando: php artisan storage:link para vincular public con storage
            Storage::deleteDirectory('public/posts');
            Storage::makeDirectory('public/posts');
            
            $this->call(UserSeeder::class);
            Category::factory(4)->create();
         
            Grupo::factory(5)->create();
            Tutorial::factory(10)->create();
            Compraventa::factory(12)->create();

            Tag::factory(8)->create();
            $this->call(PostSeeder::class);

    }
}
