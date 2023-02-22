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
        Schema::create('tuyens', function (Blueprint $table) {
            $table->id();
            $table->string('ten_tuyen');
            $table->string('thoi_gian_hd');
            $table->float('chieu_dai');
            $table->float('gia_ve_toi_thieu');
            $table->float('don_gia_ga');
            $table->int('tong_so_ga');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tuyens');
    }
};
