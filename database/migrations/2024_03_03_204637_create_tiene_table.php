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
        Schema::create('tiene', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_animal');
            $table->unsignedBigInteger('id_raza');
            $table->foreign('id_raza')->references('id')->on('raza')->onDelete('cascade');
            $table->foreign('id_animal')->references('id')->on('animal')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiene');
    }
};
