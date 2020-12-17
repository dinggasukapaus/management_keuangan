<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePertemuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapertemuan', function (Blueprint $table) {
            $table->string('pertemuan_id', 40);
            // $table->string('sumber_pemasukan_id');
            $table->string('keterangan');
            $table->string('tempat');
            $table->date('tanggal');
            $table->time('waktu');

            $table->primary('pertemuan_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datapertemuan');
    }
}
