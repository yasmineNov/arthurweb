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
        Schema::create('produks', function (Blueprint $table) {
            $table->increments('idProduk', 100);
            $table->string('namaProduk', 100);
            $table->integer('harga')->nullable();
            $table->text('deskripsi', 100)->nullable();
            $table->BigInteger('idKategori')->unsigned()->nullable();
            $table->foreign('idKategori')
                ->references('idKategori')->on('kategoris');
            $table->timestamps();
            $table->softDeletesTz($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
