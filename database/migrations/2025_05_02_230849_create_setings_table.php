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
        Schema::create('setings', function (Blueprint $table) {
            $table->id();
            $table->string('kop',200);
            $table->string('no_surat',200);
            $table->string('isi_awal',200);
            $table->string('isi_akhir',200);
            $table->string('nm_kepsek',200);
            $table->string('nip_kepsek',200);
            $table->string('tgl',200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setings');
    }
};
