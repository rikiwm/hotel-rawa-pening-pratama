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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name_room');
            $table->unsignedBigInteger('type_room');
            $table->foreign('type_room')->references('id')->on('categoris');
            $table->string('capacity')->nullable();
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->string('unit_double_bed')->nullable();
            $table->string('unit_single_bed')->nullable();
            $table->string('unit_kamar')->nullable();
            $table->integer('price')->nullable();
            $table->string('slug');
            $table->json('room_fasilitas');
            $table->json('tag');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
