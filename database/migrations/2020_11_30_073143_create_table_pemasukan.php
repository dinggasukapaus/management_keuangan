<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;

class CreateTablePemasukan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->string('pemasukan_id', 40);
            $table->string('sumber_pemasukan_id');
            $table->integer('nominal');
            $table->datetime('tanggal');
            $table->text('keterangan');

            $table->primary('pemasukan_id');

            //relasi table sumber pemasukan dengan pemasukan
            $table->foreign('sumber_pemasukan_id')
                ->references('id')->on('tb_sumber_pemasukan')
                //jika ada fild yang suda h mengarah ke table sumber
                //maka record pada table tersebut tidak dapat dihapus
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemasukan');
    }
}
