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
        // Skip this migration on master database; only create in tenant DBs
        if (Schema::getConnection()->getName() === 'mysql') {
            return;
        }

        Schema::create('callings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
        });
    }   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Only drop in tenant DBs
        if (Schema::getConnection()->getName() === 'mysql') {
            return;
        }

        Schema::dropIfExists('callings');
        
    }
};
