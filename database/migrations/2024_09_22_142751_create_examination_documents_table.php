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
        Schema::create('examination_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('examination_id');
            $table->string('file_name');      // Nama file asli
            $table->string('file_path');      // Path atau URL dari file
            $table->string('file_type');      // Jenis file (pdf, jpg, dsb)
            $table->timestamps();

            $table->foreign('examination_id')->references('id')->on('examinations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examination_documents');
    }
};
