<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Trafo;
use Carbon\Carbon;
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
            $table->enum('phase', [1, 3]); 
            $table->string('latitude');
            $table->string('longitude');
            $table->integer('capacity');
            $table->date('installation_date');
            $table->unsignedBigInteger('trafo_performance_id')->default(0);
            $table->unsignedBigInteger('user_id')->default(0);
            $table->foreign('trafo_performance_id')->references('id')->on('trafo_performances')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        $trafos = Trafo::all();
        foreach ($trafos as $trafo) {
            if ($trafo->installation_date) {
                $installationDate = Carbon::createFromFormat('Y-m-d', $trafo->installation_date)->format('d-m-Y');
                $trafo->update(['installation_date' => $installationDate]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trafos');
    }
};
