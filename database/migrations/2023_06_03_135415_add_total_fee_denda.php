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
        Schema::table('transaksi', function(Blueprint $table){
            $table->decimal('denda', 8, 2)->after('jumlah_pembayaran')->nullable();
            $table->decimal('fee', 8, 2)->after('denda')->nullable();
            $table->decimal('total', 8, 2)->after('fee')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
};
