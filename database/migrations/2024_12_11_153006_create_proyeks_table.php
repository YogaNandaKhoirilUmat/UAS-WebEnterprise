<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('proyeks', function (Blueprint $table) {
            $table->string('nama_proyek');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('status_proyek');
            $table->text('lokasi')->nullable();
        });
    }

    public function down()
    {
        Schema::table('proyeks', function (Blueprint $table) {
            $table->dropColumn([
                'nama_proyek',
                'deskripsi',
                'tanggal_mulai',
                'tanggal_selesai',
                'status_proyek',
                'lokasi',
            ]);
        });
    }

};
