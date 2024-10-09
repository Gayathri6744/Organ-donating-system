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
        Schema::create('userreg', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('email')->unique();
            // $table->string('password');
            // $table->enum('role', ['admin', 'doctor', 'user']); // Defines the user role
            $table->enum('type', ['donor', 'patient']); // Radio button to differentiate between donor and patient
            $table->enum('blood_group', ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']); // Blood group of the user
            $table->string('phone_number');
            $table->text('address');
            $table->date('date_of_birth');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userreg');
    }
};
