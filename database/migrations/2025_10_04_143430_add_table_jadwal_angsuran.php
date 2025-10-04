<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_jadwal_angsurans_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jadwal_angsurans', function (Blueprint $table) {
            $table->id();
            $table->string('kontrak_no', 20);
            $table->integer('angsuran_ke');
            $table->decimal('angsuran_per_bulan', 15, 2);
            $table->date('tanggal_jatuh_tempo');
            $table->foreign('kontrak_no')->references('kontrak_no')->on('kontraks');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_angsurans');
    }
};
