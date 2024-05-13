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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->enum('employee_id', ['admin1', 'manager1', 'manager2', 'manager3', 'teknis1', 'teknis2', 'teknis3'])->unique()->nullable();            $table->enum('role', ['admin', 'manager', 'tim_teknis']);
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('branch_office', [
                'Branch Office 1',
                'Branch Office 2',
                'Branch Office 3',
                'Branch Office 4',
                'Branch Office 5',
                'Branch Office 6',
                'Branch Office 7',
            ])->default('Branch Office 1');
            $table->string('password');
            $table->string('department')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
