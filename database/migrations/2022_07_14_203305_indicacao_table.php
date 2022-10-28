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
        Schema::create('indicacao', function (Blueprint $table) {
            $table->id();
            $table->string('tituloIndicacao');
            $table->string('numeroIndicacao');
            $table->integer('autor');
            $table->date('dataVotacao');
            $table->integer('status');
            $table->string('descricao', 2500);
            $table->string('documento')->nullable();
            $table->string('ano');
            $table->integer('municipio');
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
        Schema::dropIfExists('indicacao');
    }
};