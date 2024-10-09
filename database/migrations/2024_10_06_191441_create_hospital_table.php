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
        Schema::create('hospital', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('email')->unique(); // Email field for contact
            $table->text('address');
            $table->string('phone_number');
            $table->decimal('latitude', 10, 7)->nullable(); // Latitude for hospital's location
            $table->decimal('longitude', 10, 7)->nullable(); // Longitude for hospital's location
            $table->string('image')->nullable(); // Image for hospital's profile
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital');
    }
};
