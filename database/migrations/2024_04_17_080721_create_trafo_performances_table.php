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
        Schema::create('trafo_performances', function (Blueprint $table) {
            $table->id();
            $table->integer('voltage');
            $table->integer('current');
            $table->float('temperature');
            $table->enum('blackout_status', ['Blackout', 'Active']);

            $table->float('active_power')->nullable(); // Watts (W)
            $table->float('reactive_power')->nullable(); // Volt-amperes reactive (VAR)
            $table->float('apparent_power')->nullable(); // Volt-amperes (VA)
            $table->float('voltage_thd')->nullable(); // Percentage (%)
            $table->float('current_thd')->nullable(); // Percentage (%)
            $table->float('total_power_losses')->nullable(); // Watts (W)
            $table->float('power_factor')->nullable(); // Unitless (ratio)
            $table->float('frequency')->nullable(); // Hertz (Hz)
            $table->float('pressure')->nullable(); // Pascals (Pa) or bar
            $table->float('k_factor')->nullable(); // Unitless (ratio)
            $table->float('individual_harmonics')->nullable(); // Percentage (%) or specific values
            $table->float('tripplen_harmonics')->nullable(); // Percentage (%) or specific values
            $table->float('power_losses')->nullable(); // Watts (W)
            $table->float('oil_pressure')->nullable(); // Pascals (Pa) or bar
            $table->float('oil_temperature')->nullable(); // Degrees Celsius (°C)

            $table->enum('status', ['Normal', 'Warning', 'Error']);
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
        Schema::dropIfExists('trafo_performances');
    }
};
