<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique(); //para verificar que no haya dos productos con el mismo slug
            $table->integer('qty'); //cantidad disponible de productos
            $table->integer('price'); //precio de los productos
            $table->longText('desc'); //descripcion del producto
            $table->string('thumbnail'); //url o nombre del archivo de la imagen en miniatura del producto
            $table->string('first_image')->nullable(); //primera url de la imagen del producto
            $table->string('second_image')->nullable(); //segunda url de la imagen del producto
            $table->string('third_image')->nullable(); //tercera url de la imagen del producto
            $table->string('status')->default(1); //estado del producto, el 1 indica que esta disponible
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
