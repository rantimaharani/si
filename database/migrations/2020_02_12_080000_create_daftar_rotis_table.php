<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarRotisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_rotis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_roti');
            $table->unsignedBigInteger('id_kategori');
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('cascade');
            $table->string('foto')->nullable();
            $table->string('deskripsi');
            $table->string('slug');
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
        Schema::dropIfExists('daftar_rotis');
    }
}
