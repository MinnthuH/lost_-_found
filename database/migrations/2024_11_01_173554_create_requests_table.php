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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('job_id')->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('name');
            $table->string('phone_color');
            $table->string('imei_number');
            $table->date('lost_date')->nullable();
            $table->string('lost_time')->nullable();
            $table->string('lost_location')->nullable();
            $table->string('contact_number');
            $table->string('contact_email')->nullable();
            $table->string('address')->nullable();
            $table->string('social_url')->nullable();
            $table->string('message')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default('inreview');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
