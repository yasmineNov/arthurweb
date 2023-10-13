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
        Schema::create('carts', function (Blueprint $table) {

            $table->id(); // Kolom id otomatis yang bertipe big integer
            $table->string('name'); // Kolom name
            $table->unsignedBigInteger('idProduk'); // Kolom idProduk yang bertipe unsigned big integer
            $table->integer('qty')->nullable();
            $table->integer('subtotal')->nullable();

            // Menambahkan foreign key constraint
            $table->foreign('idProduk')
                ->references('idProduk')
                ->on('produks')
                ->onDelete('cascade'); // Menambahkan constraint ON DELETE CASCADE

            $table->timestamps(); // Kolom created_at dan updated_at

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
