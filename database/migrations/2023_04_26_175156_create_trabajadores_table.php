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
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->id('idTra');
            $table->foreignId('idUsu')
            ->references('idUsu')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->unsignedBigInteger();
            $table->foreignId('jefe')
            ->references('idUsu')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->unsignedBigInteger();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajadores');
    }
};
