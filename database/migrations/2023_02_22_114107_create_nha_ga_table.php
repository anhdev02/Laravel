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
        Schema::create('nha_gas', function (Blueprint $table) {
            $table->id();
            $table->integer('ma_tuyen');
            $table->foreign('ma_tuyen')->references('id')->on('tuyens')->onDelete('cascade');
            $table->integer('thu_tu');
            $table->string('ten_nha_ga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nha_gas');
    }
};
