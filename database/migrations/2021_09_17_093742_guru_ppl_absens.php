<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GuruPPLAbsens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru_ppl_absens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_guru_ppl');
            $table->foreign('id_guru_ppl')->references('id')->on('guru_ppl')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->date('tgl');
            $table->time('jam_masuk')->nullable();
            $table->time('jam_keluar')->nullable();
            $table->time('jam_kerja')->nullable();
            $table->string('lokasi_absen')->nullable();
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
        Schema::dropIfExists('guru_ppl_absens');
    }
}
