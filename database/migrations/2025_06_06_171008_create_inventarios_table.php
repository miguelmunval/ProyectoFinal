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
        Schema::create('inventario', function (Blueprint $table) {
            $table->id('idInv');
            $table->foreignId('idUsu')
            ->references('idUsu')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->unsignedBigInteger();
            $table->foreignId('idObj')
            ->references('idObj')
            ->on('objetos')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->unsignedBigInteger();
            $table->string('Cantidad');
            $table->date('FechComp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};
