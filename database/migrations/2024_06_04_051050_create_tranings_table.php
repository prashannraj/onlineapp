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
        Schema::create('tranings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained()->cascadeOnDelete();
            $table->foreignId('detail_id')->constrained()->cascadeOnDelete();
            $table->string('instuate');
            $table->string('name');
            $table->string('division');
            $table->string('pass_year');
            $table->string('certificate_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tranings');
    }
};
