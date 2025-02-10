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

        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('prestasi_id')->nullable()->constrained('prestasis')->onDelete('cascade');
            
            // $table->foreignId('class_id')->nullable()->constrained()->change();
            // $table->foreignId('section_id')->nullable()->constrained();

            // Biodata
            $table->string('name');
            $table->string('birthplace');
            $table->string('birthdate');
            $table->string('address');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('parent');
            $table->string('parentjob');
            $table->string('quran')->nullable();
            $table->string('pendapatan')->nullable();

            // Score
            $table->bigInteger('tes_iq')->nullable()->default(0);
            $table->bigInteger('tes_masuk')->nullable()->default(0);
            $table->bigInteger('score_quran')->nullable()->default(0);
            $table->bigInteger('score_pendapatan')->nullable()->default(0);
            $table->bigInteger('tes_prestasi')->nullable()->default(0);


            $table->boolean('has_submitted')->default(false);   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
