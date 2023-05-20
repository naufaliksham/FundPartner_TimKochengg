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
        Schema::create('detail_usaha', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mitra');
            $table->foreign('id_mitra')->references('id')->on('users');
            $table->string('nama_usaha');
            $table->text('despripsi');
            $table->integer('dana');
            // $table->foreignId('id_MoU');
            // $table->foreign('id_MoU')->references('id')->on('MoU');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_usaha');
    }
};
