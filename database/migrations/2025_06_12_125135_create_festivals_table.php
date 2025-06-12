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
        Schema::create('festivals', function (Blueprint $table) {
            $table->id();
            $table->string('name_mk');
            $table->string('name_en');
            $table->string('name_sr');
            $table->string('slug')->unique(); // ⬅️ ова го додаваме
            $table->date('start_date');
            $table->date('end_date');
            $table->string('location')->nullable();
            $table->year('year');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('festivals');
    }
};
