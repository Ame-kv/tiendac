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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('title'); //titulo de la reseña
            $table->longText('body'); //contenido de la reseña
            $table->integer('rating'); //calificacion dada a la reseña
            $table->boolean('approved')->default(0); //para ver si el comentario ha sido aprovado, valor por defecto es 0, lo que quiere decir que la reseña no esta aprobada
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); //para almacenar el id del usuario que ha creado la reseña
            //constrained indica que usar user_id corresponde a una clave primaria en la tabla de users
            //cascadeOnDelete propiedad que indica que si un usuario ha sido eliminado, todas las reseñas que haya hecho también se eliminan
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
