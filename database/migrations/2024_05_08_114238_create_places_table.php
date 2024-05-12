<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('alias')->unique();
            $table->text('description');
            $table->text('keywords')->nullable();
            $table->string('email');
            $table->string('zip_code');
            $table->text('address');
            $table->string('number');
            $table->string('complement')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('geo_location');
            $table->string('phone');
            $table->string('whatsapp')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->boolean('status')->default(true);
            $table->foreignId('category_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['user_id']);
        });
    }
};
