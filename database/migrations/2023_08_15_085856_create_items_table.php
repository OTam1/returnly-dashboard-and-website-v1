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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('item_name');
            $table->string('color');
            $table->integer('city_id');
            $table->string('city');
            $table->integer('place_id');
            $table->string('place');
            $table->integer('category_id');
            $table->string('category');
            $table->integer('sub_category_id');
            $table->string('sub_category');
            $table->string('image')->nullable();
            $table->string('status');
            $table->date('date');
            $table->time('time');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
