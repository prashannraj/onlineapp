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
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sub_service_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sup_service_id')->constrained()->cascadeOnDelete();
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            $table->foreignId('level_id')->constrained()->cascadeOnDelete();
            $table->foreignId('qualification_id')->constrained()->cascadeOnDelete();
            $table->integer('Adv_number');
            $table->unsignedInteger('single_fee');
            $table->unsignedInteger('double_fee');
            $table->date('open_date_bs');
            $table->date('single_payment_date_bs');
            $table->date('double_payment_date_bs');
            $table->text('description', 65536)->nullable()->default('text');
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
