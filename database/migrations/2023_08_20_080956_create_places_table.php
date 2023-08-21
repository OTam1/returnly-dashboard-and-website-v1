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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('city_id');
            $table->string('place_name_en');
            $table->string('place_name_ar');
            $table->boolean('status')->default(true);
            $table->timestamps(0); // This will create created_date and updated_date as timestamps

            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('city_id')->references('id')->on('cities');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
