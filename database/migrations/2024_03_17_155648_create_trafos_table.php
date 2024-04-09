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
            $table->string('trafo_id');
            $table->string('brand'); 
            $table->string('city');
            $table->enum('phase', ['blackout', 'active']); 
            $table->string('latitude');
            $table->string('longitude');
            $table->string('capacity');
            $table->timestamp('installation_date');
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
