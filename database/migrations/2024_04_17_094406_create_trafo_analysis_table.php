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
        Schema::create('trafo_analysis', function (Blueprint $table) {
            $table->id();
            $table->float('load_demand');
            $table->float('unbalanced_load');
            $table->float('unbalanced_voltage');
            $table->float('current_regulation');
            $table->enum('temperature_analysis', ['Normal', 'Warning', 'Error']);
            $table->enum('load_demand_analysis', ['Normal', 'Warning', 'Error']);
            $table->enum('unbalanced_load_analysis', ['Normal', 'Warning', 'Error']);
            $table->enum('unbalanced_voltage_analysis', ['Normal', 'Warning', 'Error']);
            $table->enum('current_regulation_analysis', ['Normal', 'Warning', 'Error']);
            $table->enum('blackout_status_analysis', ['Normal', 'Error']);
            $table->unsignedBigInteger('trafo_id')->default(0);
            $table->foreign('trafo_id')->references('id')->on('trafos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trafo_analysis');
    }
};
