<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableSumberPengeluaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pengeluaran', function (Blueprint $table) {
            $table->string('pengeluaran_id', 40);
            $table->integer('nominal_luar');
            $table->datetime('tanggal_pengeluaran');
            $table->text('keterangan');
            $table->timestamps();

            $table->primary('pengeluaran_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pengeluaran');
    }
}
