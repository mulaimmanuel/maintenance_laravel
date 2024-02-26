<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tindaklanjuts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_mesin');
            $table->string('no_mesin');
            $table->string('merk');
            $table->string('type');
            $table->year('mfg_date');
            $table->year('acq_date');
            $table->date('preventive_date');
            $table->string('foto');
            $table->string('sparepart');

            $table->foreign('id_fpp')->references('id_fpp')->on('form_f_p_p_s');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesins');
    }
};
