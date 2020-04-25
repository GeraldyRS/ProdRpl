<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->increments('id')->onDelete('cascade');
            $table->integer('id_jadwal')->nullable();
            $table->date('tanggal')->nullable();
            $table->time('mulai')->nullable()
            $table->time('selesai')->nullable()
            $table->string('kegiatan')->nullable()
            $table->integer('lampiran')->nullable();
            $table->string('mapel')->nullable();
            $table->string('bukti')->nullable();
            $table->integer('status')->nullable();
            $table->string('updated_at')->nullable();
            $table->string('created_at')->nullable();
        });
    }

}
