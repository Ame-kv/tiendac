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
        Schema::create('color_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('color_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete(); //constrained sirve para limitar los datos que se puedan almacenar en una tabla
            $table->timestamps();                                              //asegurando la integridad y la coherencia de la información
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_product');
    }
};
