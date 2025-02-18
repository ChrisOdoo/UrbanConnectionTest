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
        Schema::create('historial_carrito', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('tienda_id');
            $table->unsignedBigInteger('vendedor_id');
            $table->integer('cantidad');
            $table->float('total');
            $table->timestamps();
    
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('tienda_id')->references('id')->on('tiendas')->onDelete('cascade');
            $table->foreign('vendedor_id')->references('id')->on('vendedores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_carrito');
    }
};
