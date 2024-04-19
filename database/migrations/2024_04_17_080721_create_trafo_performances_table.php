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
