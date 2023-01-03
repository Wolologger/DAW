<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug');            

            $table->longText('body');

            $table->string('contact');
            $table->string('gender');
 
            $table->string('city');
            $table->string('state');
            // $table->string('country');
            $table->enum('search', array(
            'Ninguno',
            'Bajista',
            'Cantante',
            'Guitarrista',
            'Batería',
            'Teclista',
            'Tecnico de sonido')
            )->default('Ninguno');

            $table->enum('status',[1,2])->default(1);

            $table->unsignedBigInteger('user_id');

            // Creando claves foraneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo');
    }
};
