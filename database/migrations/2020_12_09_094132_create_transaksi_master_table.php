<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_master', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->integer('id_pelanggan');
            $table->integer('id_kasir');
            $table->integer('id_tempat');
            $table->string('id_no_telepon');
            $table->decimal('total_transaksi');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_master');
    }
}
