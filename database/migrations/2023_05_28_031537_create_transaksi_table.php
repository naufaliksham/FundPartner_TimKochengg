<?php

use Faker\Core\Uuid;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Rfc4122\UuidV4;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('id_user')->references('id')->on('users');
            $table->foreignId('id_mitra')->references('id')->on('detail_usaha');
            $table->string('jenis_pembayaran')->nullable();
            $table->integer('jumlah_pembayaran')->defaultValue(0);
            $table->timestamp('waktu_pembayaran');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
