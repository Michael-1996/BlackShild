<?php

use App\Models\Agent;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('civilite');
            $table->unsignedBigInteger('departement_id')->nullable();
            $table->string('statutmatrimonial');
            $table->string('nom');
            $table->string('prenoms');
            $table->string('email')->nullable();
            $table->date('datenaissance');
            $table->string('matricule')->nullable();
            $table->string('codepostal')->nullable();
            $table->string('numeromobile')->nullable();
            $table->string('adressegeo')->nullable();
            $table->string('numerofixe')->nullable();
            $table->string('nationalite');
            $table->string('numerocni')->nullable();
            $table->string('numeropermis')->nullable();
            $table->string('lieudelivrancepermis')->nullable();
            $table->string('categoriepermis')->nullable();
            $table->date('dateetablpermis')->nullable();
            $table->date('dateexpirpermis')->nullable();
            $table->string('numeross')->nullable();
            $table->string('numeroetranger')->nullable();
            $table->string('lieudelivrancecs')->nullable();
            $table->date('etablissementcartedesejour')->nullable();
            $table->date('expirationcartedesejour')->nullable();
            $table->string('typecontrat');
            $table->string('dureeducontrat')->nullable();
            $table->string('qualification')->nullable();
            $table->string('numeroads')->nullable();
            $table->string('nomchien')->nullable();
            $table->date('datevaliditevaccin')->nullable();
            $table->timestamps();

            $table->foreign('departement_id')->references('id')->on('departements')
            ->onDelete('restrict')
            ->onUpdate('restrict');
        });

        //creation d'un agent
        Agent::create([
            "civilite" => "M",
            "nom" => "SANA",
            "datenaissance" => "1996-12-04",
            "statutmatrimonial" => "mar",
            "prenoms" => "Michael Yves",
            "matricule" => "08164322E",
            "codepostal" => "00225",
            "numeromobile" => "22589301051",
            "nationalite" => "ET",
            "numeroetranger" => "NUEMETR456789",
            "lieudelivrancecs" => "LIEUDELIVRANCE",
            "etablissementcartedesejour" => "2019-10-16",
            "expirationcartedesejour" => "2019-10-15",
            "typecontrat" => "cdi",
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents');
    }
}