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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained()->cascadeOnDelete();
            $table->string('full_name_english');
            $table->string('full_name_nepali');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('grandf_name');
            $table->longText('permanent_address');
            $table->string('contact_number');
            $table->string('citizenship_number');
            $table->string('citizenship_image');
            $table->string('Photo_image');
            $table->string('Sign_image');
            $table->string('education');
            $table->string('traning')->nullable();
            $table->string('council')->nullable();
            $table->string('experience')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
