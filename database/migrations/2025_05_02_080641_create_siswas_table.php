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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nis',15);
            $table->string('nisn',15)->nullable();
            $table->string('nm_siswa',200);
            $table->string('ttl',100);
            $table->string('jen_konsentrasi',100);
            $table->string('kls',20);
            $table->string('status_lulus',5);
            $table->string('status_bayar',5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
