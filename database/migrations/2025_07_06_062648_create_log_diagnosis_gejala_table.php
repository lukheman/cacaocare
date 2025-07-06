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
        Schema::create('log_diagnosis_gejala', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_log_diagnosis')->constrained('log_diagnosis')->cascadeOnDelete();
            $table->foreignId('id_gejala')->constrained('gejala')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_diagnosis_gejala');
    }
};
