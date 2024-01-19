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
        Schema::create('test__results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
             $table->integer('user_id')->nullable();
            $table->string('sname');
            $table->string('lname');
            $table->integer('age')->nullable();
            $table->string('agecount')->nullable();
            $table->string('test_carriedout')->nullable();
            $table->binary('image_upload')->nullable();
            $table->string('test_result')->nullable();
            $table->string('flag')->nullable();
            $table->string('range')->nullable();
            $table->string('comment')->nullable();
            $table->string('units')->nullable();
            $table->string('preview')->nullable();
            $table->date('result_date')->default(now()->format('Y-m-d'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test__results');
    }
};
