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
            $table->foreignId('coleccion_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->string('nombre');
            $table->string('descripcion');
            $table->float('precio');
            $table->string('marca');
            $table->string('modelo');
            $table->string('procedencia');
            $table->string('ficha_tecnica');
            $table->boolean('new');
            $table->boolean('oferta');
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
