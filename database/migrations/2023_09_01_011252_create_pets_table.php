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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('kind');
            $table->string('name');
            $table->string('date_of_birth');
            $table->string('weight');

            $table->unsignedBigInteger('idBreed');
            $table->foreign('idBreed')->references('id')->on('breeds');

            $table->unsignedBigInteger('idSize');
            $table->foreign('idSize')->references('id')->on('sizes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
