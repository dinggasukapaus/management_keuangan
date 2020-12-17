<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapegawai', function (Blueprint $table) {
            $table->string('pegawai_id',40);
            $table->string('nama');
            $table->string('nohp',15);
            $table->string('jabatan');
            $table->text('alamat');

            $table->primary('pegawai_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datapegawai');
    }
}
