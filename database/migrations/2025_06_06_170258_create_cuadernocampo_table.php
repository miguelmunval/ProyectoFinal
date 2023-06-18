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
        Schema::create('cuadernocampo', function (Blueprint $table) {
            $table->id('idCua');
            $table->foreignId('idPar')
            ->references('idPar')
            ->on('parcelas')
            ->unsignedBigInteger();
            $table->foreignId('idPro')
            ->references('idPro')
            ->on('productos')
            ->unsignedBigInteger();
            $table->foreignId('idTra')
            ->references('idTra')
            ->on('trabajadores')
            ->unsignedBigInteger();
            $table->date('fechafitosanitario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuadernocampo');
    }
};
