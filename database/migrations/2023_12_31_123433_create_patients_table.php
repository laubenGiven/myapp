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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id')->nullable();
            $table->string('sname');
            $table->string('lname');
            $table->string('email')->nullable();
            $table->integer('contact');
            $table->string('sex');
            $table->integer('age')->nullable();
            $table->string('agecount')->nullable();
            $table->date('test_date')->default(now()->format('Y-m-d')); 
            $table->timestamps(); 
                      
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
