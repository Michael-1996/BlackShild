<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('agent_id');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->text('motif')->nullable();
            $table->timestamps();

            $table->foreign('agent_id')->references('id')->on('agents')
                ->onDelete('restrict')
                ->onUpdate('restrict');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conges');
    }
}
