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
        Schema::create('subsubmenus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submenu_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('nombre');
            $table->string('enlace');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subsubmenus');
    }
};
