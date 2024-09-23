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
        Schema::create('examinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained('users');
            $table->foreignId('patient_id')->constrained('patients');
            $table->foreignId('vital_signs_id')->constrained('vital_signs')->nullable();
            $table->foreignId('state_id')->constrained('examination_states');
            $table->dateTime('appointment_date');
            $table->text('examination_notes')->nullable();
            $table->json('documents')->nullable(); // Uploaded files
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examinations');
    }
};
