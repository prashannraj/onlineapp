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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained()->cascadeOnDelete();
            $table->foreignId('detail_id')->constrained()->cascadeOnDelete();
            $table->string('university');
            $table->string('faculty');
            $table->string('edu_name');
            $table->string('division');
            $table->string('gpa');
            $table->string('pass_year');
            $table->string('charcter_image');
            $table->string('trancript_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
