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
        Schema::create('phone_models', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('device_id')->constrained('devices')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('devices')->onDelete('cascade');
            $table->string('model');
            $table->string('color');
            $table->boolean('status')->default(1);
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone_models');
    }
};
