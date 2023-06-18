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
        Schema::create('actividades', function (Blueprint $table) {
            $table->id('idAct');
            $table->foreignId('idPar')
            ->references('idPar')
            ->on('parcelas')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->unsignedBigInteger();
            $table->foreignId('idTra')
            ->references('idTra')
            ->on('trabajadores')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->unsignedBigInteger();
            $table->string('desAct');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividades');
    }
};
