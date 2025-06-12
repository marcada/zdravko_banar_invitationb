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
            $table->string('name_hr')->nullable();
            $table->string('name_bg')->nullable();
            $table->string('name_pl')->nullable();
            $table->string('name_uk')->nullable();
            $table->string('name_ro')->nullable();
            $table->string('name_tr')->nullable();
            $table->string('slug')->unique();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('location');
            $table->integer('year');
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
