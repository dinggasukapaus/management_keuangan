<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataproduksi', function (Blueprint $table) {
            $table->string('produksi_id', 40);
            // $table->string('sumber_pemasukan_id');
            $table->string('produksi',100);
            $table->integer('pengeluaran');
            $table->integer('jumlah');
            $table->date('tanggal');

            $table->primary('produksi_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dataproduksi');
    }
}
