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
        Schema::create('projeto', function (Blueprint $table) {
            $table->id();
            $table->integer('sessao');
            $table->string('titulo');
            $table->string('numero');
            $table->integer('categoria');
            $table->integer('autor');
            $table->timestamp('dataVotacao');
            $table->integer('status');
            $table->string('descricao', 2500)->nullable();
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
        Schema::dropIfExists('projeto');
    }
};