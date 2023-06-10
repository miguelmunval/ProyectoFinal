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
            $table->foreignId('idPar')
            ->references('idPar')
            ->on('parcelas')
            ->unsignedBigInteger();
            $table->foreignId('idTra')
            ->references('idTra')
            ->on('trabajadores')
            ->unsignedBigInteger();
            $table->string('desAct');
            
            $table->primary(['idPar', 'idTra']);
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
