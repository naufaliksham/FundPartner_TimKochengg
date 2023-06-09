<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //add dana terkumpul
        Schema::table('detail_usaha', function (Blueprint $table) {
            $table->string('gambar');
            $table->integer('waktu')->after('gambar')->nullable();
            $table->string('status')->after('waktu')->default("Belum didanai");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
