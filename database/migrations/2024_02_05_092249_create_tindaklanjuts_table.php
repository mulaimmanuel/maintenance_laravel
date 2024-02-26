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
            $table->string('id_fpp');
            $table->date('tindak_lanjut');
            $table->date('due_date');
            $table->date('schedule_pengecekan');
            $table->string('attachment_file');
            $table->string('note');
            $table->integer('status');

            $table->foreign('id_fpp')->references('id_fpp')->on('form_f_p_p_s');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tindaklanjuts');
    }
};
