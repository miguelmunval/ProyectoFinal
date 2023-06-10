<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcelas', function (Blueprint $table) 
        {
            $table->id('idPar');
            $table->foreignId('idUsu')
            ->references('idUsu')
            ->on('users')
            ->unsignedBigInteger();
            $table->foreignId('idCult')
            ->references('idCult')
            ->on('cultivos')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->unsignedBigInteger();
            $table->string('locPar');
            $table->integer('tamPar');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcelas');
    }
};
?>