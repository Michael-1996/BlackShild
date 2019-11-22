<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->timestamps();
        });

        $data=[
            [
                'nom'=>'01 - Ain - Bourg-en-bresse'
            ],
            [
                'nom'=>'02 - Aisne - Laon'
            ],
            [
                'nom'=>'03 - Allier - Moulins'
            ],
            [
                'nom'=>'04 - Alpes-de-Haute-Provence - Digne-les-bains'
            ],
            [
                'nom'=>'05 - Hautes-alpes - Gap'
            ],
            [
                'nom'=>'06 - Alpes-maritimes - Nice'
            ],
            [
                'nom'=>'07 - Ardèche - Privas'
            ],
            [
                'nom'=>'08 - Ardennes - Charleville-mézières'
            ],
            [
                'nom'=>'09 - Ariège - Foix'
            ],
            [
                'nom'=>'10 - Aube - Troyes'
            ],
            [
                'nom'=>'11 - Aude - Carcassonne'
            ],
            [
                'nom'=>'12 - Aveyron - Rodez'
            ],
            [
                'nom'=>'13 - Bouches-du-Rhône - Marseille'
            ],
            [
                'nom'=>'14 - Calvados - Caen'
            ],
            [
                'nom'=>'15 - Cantal - Aurillac'
            ],
            [
                'nom'=>'16 - Charente - Angoulême'
            ],
            [
                'nom'=>'17 - Charente-maritime - La rochelle'
            ],
            [
                'nom'=>'18 - Cher - Bourges'
            ],
            [
                'nom'=>'19 - Corrèze - Tulle'
            ],
            [
                'nom'=>'2a - Corse-du-sud - Ajaccio'
            ],
            [
                'nom'=>'2b - Haute-Corse - Bastia'
            ],
            [
                'nom'=>'21 - Côte-d\'Or - Dijon'
            ],
            [
                'nom'=>'22 - Côtes-d\'Armor - Saint-brieuc'
            ],
            [
                'nom'=>'23 - Creuse - Guéret'
            ],
            [
                'nom'=>'24 - Dordogne - Périgueux'
            ],
            [
                'nom'=>'25 - Doubs - Besançon'
            ],
            [
                'nom'=>'26 - Drôme - Valence'
            ],
            [
                'nom'=>'27 - Eure - Évreux'
            ],
            [
                'nom'=>'28 - Eure-et-loir - Chartres'
            ],
            [
                'nom'=>'29 - Finistère - Quimper'
            ],
            [
                'nom'=>'30 - Gard - Nîmes'
            ],
            [
                'nom'=>'31 - Haute-garonne - Toulouse'
            ],
            [
                'nom'=>'32 - Gers - Auch'
            ],
            [
                'nom'=>'33 - Gironde - Bordeaux'
            ],
            [
                'nom'=>'34 - Hérault - Montpellier'
            ],
            [
                'nom'=>'35 - Ille-et-vilaine - Rennes'
            ],
            [
                'nom'=>'36 - Indre - Châteauroux'
            ],
            [
                'nom'=>'37 - Indre-et-loire - Tours'
            ],
            [
                'nom'=>'38 - Isère - Grenoble'
            ],
            [
                'nom'=>'39 - Jura - Lons-le-saunier'
            ],
            [
                'nom'=>'40 - Landes - Mont-de-marsan'
            ],
            [
                'nom'=>'41 - Loir-et-cher - Blois'
            ],
            [
                'nom'=>'42 - Loire - Saint-étienne'
            ],
            [
                'nom'=>'43 - Haute-loire - Le puy-en-velay'
            ],
            [
                'nom'=>'44 - Loire-atlantique - Nantes'
            ],
            [
                'nom'=>'45 - Loiret - Orléans'
            ],
            [
                'nom'=>'46 - Lot - Cahors'
            ],
            [
                'nom'=>'47 - Lot-et-garonne - Agen'
            ],
            [
                'nom'=>'48 - Lozère - Mende'
            ],
            [
                'nom'=>'49 - Maine-et-loire - Angers'
            ],
            [
                'nom'=>'50 - Manche - Saint-lô'
            ],
            [
                'nom'=>'51 - Marne - Châlons-en-champagne'
            ],
            [
                'nom'=>'52 - Haute-marne - Chaumont'
            ],
            [
                'nom'=>'53 - Mayenne - Laval'
            ],
            [
                'nom'=>'54 - Meurthe-et-moselle - Nancy'
            ],
            [
                'nom'=>'55 - Meuse - Bar-le-duc'
            ],
            [
                'nom'=>'56 - Morbihan - Vannes'
            ],
            [
                'nom'=>'57 - Moselle - Metz'
            ],
            [
                'nom'=>'58 - Nièvre - Nevers'
            ],
            [
                'nom'=>'59 - Nord - Lille'
            ],
            [
                'nom'=>'60 - Oise - Beauvais'
            ],
            [
                'nom'=>'61 - Orne - Alençon'
            ],
            [
                'nom'=>'62 - Pas-de-calais - Arras'
            ],
            [
                'nom'=>'63 - Puy-de-dôme - Clermont-ferrand'
            ],
            [
                'nom'=>'64 - Pyrénées-atlantiques - Pau'
            ],
            [
                'nom'=>'65 - Hautes-Pyrénées - Tarbes'
            ],
            [
                'nom'=>'66 - Pyrénées-orientales - Perpignan'
            ],
            [
                'nom'=>'67 - Bas-rhin - Strasbourg'
            ],
            [
                'nom'=>'68 - Haut-rhin - Colmar'
            ],
            [
                'nom'=>'69 - Rhône - Lyon'
            ],
            [
                'nom'=>'70 - Haute-saône - Vesoul'
            ],
            [
                'nom'=>'71 - Saône-et-loire - Mâcon'
            ],
            [
                'nom'=>'72 - Sarthe - Le mans'
            ],
            [
                'nom'=>'73 - Savoie - Chambéry'
            ],
            [
                'nom'=>'74 - Haute-savoie - Annecy'
            ],
            [
                'nom'=>'75 - Paris - Paris'
            ],
            [
                'nom'=>'76 - Seine-maritime - Rouen'
            ],
            [
                'nom'=>'77 - Seine-et-marne - Melun'
            ],
            [
                'nom'=>'78 - Yvelines - Versailles'
            ],
            [
                'nom'=>'79 - Deux-sèvres - Niort'
            ],
            [
                'nom'=>'80 - Somme - Amiens'
            ],
            [
                'nom'=>'81 - Tarn - Albi'
            ],
            [
                'nom'=>'82 - Tarn-et-garonne - Montauban'
            ],
            [
                'nom'=>'83 - Var - Toulon'
            ],
            [
                'nom'=>'84 - Vaucluse - Avignon'
            ],
            [
                'nom'=>'85 - Vendée - La roche-sur-yon'
            ],
            [
                'nom'=>'86 - Vienne - Poitiers'
            ],
            [
                'nom'=>'87 - Haute-vienne - Limoges'
            ],
            [
                'nom'=>'88 - Vosges - Épinal'
            ],
            [
                'nom'=>'89 - Yonne - Auxerre'
            ],
            [
                'nom'=>'90 - Territoire de belfort - Belfort'
            ],
            [
                'nom'=>'91 - Essonne - Évry'
            ],
            [
                'nom'=>'92 - Hauts-de-seine - Nanterre'
            ],
            [
                'nom'=>'93 - Seine-Saint-Denis - Bobigny'
            ],
            [
                'nom'=>'94 - Val-de-marne - Créteil'
            ],
            [
                'nom'=>'95 - Val-d\'oise - Pontoise'
            ],
            [
                'nom'=>'971 - Guadeloupe - Basse-terre'
            ],
            [
                'nom'=>'972 - Martinique - Fort-de-france'
            ],
            [
                'nom'=>'973 - Guyane - Cayenne'
            ],
            [
                'nom'=>'974 - La réunion - Saint-denis'
            ],
            [
                'nom'=>'976 - Mayotte - Dzaoudzi'
            ]
        ];

        DB::table('departements')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departements');
    }
}
