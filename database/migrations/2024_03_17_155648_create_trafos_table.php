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
        Schema::create('trafos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('employee_id');
            $table->string('email')->unique(); 
            $table->string('password'); 
            $table->string('role'); 
            $table->string('branch_office');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trafos');
    }
};
