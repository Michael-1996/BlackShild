<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJourferiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jourferies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dateferie',5);
            $table->string('description');
            $table->timestamps();
        });

        $data=[
            0=>[
                'dateferie'=>'01-01',
                'description'=>'Jour de l\'An'
            ],
            1=>[
                'dateferie'=>'02-04',
                'description'=>'Pâcque'
            ],
            2=>[
                'dateferie'=>'01-05',
                'description'=>'Fête du Travail'
            ],
            3=>[
                'dateferie'=>'08-05',
                'description'=>'Victoire 1945'
            ],
            4=>[
                'dateferie'=>'10-05',
                'description'=>'Ascension'
            ],
            5=>[
                'dateferie'=>'21-05',
                'description'=>'Pentecôte'
            ],
            6=>[
                'dateferie'=>'14-07',
                'description'=>'Fête nationale'
            ],
            7=>[
                'dateferie'=>'15-08',
                'description'=>'Assomption'
            ],
            8=>[
                'dateferie'=>'01-11',
                'description'=>'Toussaint'
            ],
            9=>[
                'dateferie'=>'11-11',
                'description'=>'Armistice 1918'
            ],
            10=>[
                'dateferie'=>'25-11',
                'description'=>'Noël'
            ],
        ];

        DB::table('jourferies')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jourferies');
    }
}
