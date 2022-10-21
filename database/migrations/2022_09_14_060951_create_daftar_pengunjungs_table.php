<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_pengunjungs', function (Blueprint $table) {
                $table->id();
                $table->text("nama_lengkap");
                $table->text("nik");
                $table->text("instansi");
                $table->text("no_hp");
                $table->text("keperluan");
                $table->text("alat_pendukung");
                $table->text("nama_alat");
                $table->text("pendamping");
                $table->dateTime("waktu_masuk");
                $table->string('tandatangan_pengunjung',200);
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
        Schema::dropIfExists('daftar_pengunjungs');
    }
};
