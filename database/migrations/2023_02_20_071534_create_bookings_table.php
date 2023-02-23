<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('tuyen');
            $table->string('ga_len');
            $table->string('ga_xuong');
            $table->string('so_luong');
            $table->timestamp('thoi_gian_dat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('so_dien_thoai');
            $table->float('thanh_tien');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
