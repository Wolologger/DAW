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
        Schema::create('compraventas', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');

            $table->string('slug');

            $table->string('type');
            
            $table->longText('descripcion');
            $table->Integer('price');
            $table->enum('state_product',['Normal', 'Bueno', 'Muy bueno', 'Excelente', 'Regular']);

            $table->string('state');

            // $table->enum('status',[1,2])->default(1);

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
        Schema::dropIfExists('compraventa');
    }
};
