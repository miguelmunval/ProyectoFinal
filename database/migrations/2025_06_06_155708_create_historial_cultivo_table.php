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
        Schema::create('historial_cultivo', function (Blueprint $table) {
            $table->id('idHist');
            $table->foreignId('idPar')
            ->references('idPar')
            ->on('parcelas')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->unsignedBigInteger();
            $table->foreignId('idCult')
            ->references('idCult')
            ->on('cultivos')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->unsignedBigInteger();
            $table->date('fechaCult');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_historial__cultivo');
    }
};
