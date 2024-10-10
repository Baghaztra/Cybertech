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
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->uuid('form_id'); // pastikan ini sesuai dengan tipe id pada tabel forms
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
            $table->bigInteger('question_id')->unsigned(); // tambahkan unsigned jika kolom id di tabel questions unsigned
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->string('answer')->nullable();
            $table->string('response_code');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responses');
    }
};
