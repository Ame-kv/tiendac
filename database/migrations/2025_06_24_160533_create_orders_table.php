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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('qty'); //para la cantidad de artículos en la orden
            $table->decimal('total', 8, 2);
            $table->dateTime('delivered_at')->nullable(); //fecha y hora de entrega de la orden
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); //para usuario que realizo la compra
            $table->foreignId('coupon_id')->nullable()->constrained()->cascadeOnDelete(); //por si se utiliza cupon en la compra
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
