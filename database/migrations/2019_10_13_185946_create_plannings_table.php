<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plannings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('site_id');
            $table->unsignedBigInteger('agent_id');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->unsignedBigInteger('heure_total_jour');
            $table->unsignedBigInteger('heure_total_nuit');
            $table->string('statut');
            $table->timestamps();

            $table->foreign('agent_id')->references('id')->on('agents')
                ->onDelete('restrict')
                ->onUpdate('restrict');;
            $table->foreign('site_id')->references('id')->on('sites')
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
        Schema::dropIfExists('plannings');
    }
}
