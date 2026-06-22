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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->text('image')->nullable();
            $table->string('heading_top')->nullable();
            $table->string('heading_one')->nullable();
            $table->text('description')->nullable();
            $table->string('button_one')->nullable();
            $table->text('button_one_url')->nullable();
            $table->string('button_two')->nullable();
            $table->text('button_two_url')->nullable();
            $table->integer('serial')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
