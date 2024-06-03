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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('trafo_id')->default(0);
            $table->date('maintenance_date');
            $table->text('maintenance_data');
            $table->foreign('employee_id')->references('employee_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('trafo_id')->references('trafo_id')->on('trafos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
