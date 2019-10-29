<?php

use App\Models\Site;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('adresse');
            $table->string('email')->nullable();;
            $table->string('ville');
            $table->string('telephone')->nullable();
            $table->text('site_web')->nullable();
            $table->string('photo')->nullable();
            $table->string('nommanager')->nullable();
            $table->string('telephonemanager')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        
        //Création d'un site
        Site::create([
            "nom" => "COM&TIC",
            "adresse" => "Koumassi Pharmacie Soleil",
            "email" => "sana.michael120@gmail.com",
            "ville" => "ABIDJAN",
            "telephone" => "22589301051",
            "nommanager" => "Codo Noel",
            "telephonemanager" => "22589301051"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
}
