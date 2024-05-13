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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('year_id')->constrained('years')->cascadeOnDelete();
            $table->string('service');
            $table->string('sub_service');
            $table->string('sup_service');
            $table->string('post');
            $table->string('level');
            $table->string('qualification');
            $table->integer('Adv_number');
            $table->unsignedInteger('single_fee');
            $table->unsignedInteger('double_fee');
            $table->date('open_date_bs');
            $table->date('single_payment_date_bs');
            $table->date('double_payment_date_bs');
            $table->text('description')->nullable()->default('text');
            $table->string('name')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};