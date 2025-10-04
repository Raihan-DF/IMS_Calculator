<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kontraks', function (Blueprint $table) {
            $table->string('kontrak_no', 20)->primary();
            $table->string('client_name', 100);
            $table->decimal('otr', 15, 2);
            $table->decimal('dp', 15, 2);
            $table->integer('tenor');
            $table->decimal('bunga', 5, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kontraks');
    }
};
