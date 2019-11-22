            {{-- {{dd(\Session::all())}} --}}
            @extends('pages.agents.create.layout')
            @section('tab')
                                    <!-- form start -->
                <form id="regForm" role="form" action="{{route('agent.postStepTwo')}}" method="post">
                @csrf
                  <!-- /.box-header -->
                  <div class="box-body">
                    <div class="box-group" id="accordion">
                      <!-- One "tab" for each step in the form: -->

                      <div class="tab">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                              Coordonnées  #2
                            </a>
                          </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse">
                          <div class="box-body">
                            <div class="col-md-6">
                              <div class="form-group codepostal @error('codepostal')  has-error @enderror">
                                <label>Code postal</label>
                                <input name="codepostal" type="text" class="form-control"  placeholder="Entrer le code postal" value="{{old('codepostal') ?: $agent->codepostal}}">
                                @error('codepostal')
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label>Département</label>
                                {{$agent->nationalite}}
                                <select class="form-control departement" name="departement">
                                  <option value="">Choisir le département</option>
                                  <option value="01"  {{old('departement')=='01' || $agent->departement=='01' ? 'selected' : null}}>01 - Ain - Bourg-en-bresse</option>
                                  <option value="02"  {{old('departement')=='02' || $agent->departement=='02' ? 'selected' : null}}>02 - Aisne - Laon</option>
                                  <option value="03"  {{old('departement')=='03' || $agent->departement=='03' ? 'selected' : null}}>03 - Allier - Moulins</option>
                                  <option value="04"  {{old('departement')=='04' || $agent->departement=='04' ? 'selected' : null}}>04 - Alpes-de-Haute-Provence - Digne-les-bains</option>
                                  <option value="05"  {{old('departement')=='05' || $agent->departement=='05' ? 'selected' : null}}>05 - Hautes-alpes - Gap</option>
                                  <option value="06"  {{old('departement')=='06' || $agent->departement=='06' ? 'selected' : null}}>06 - Alpes-maritimes - Nice</option>
                                  <option value="07"  {{old('departement')=='07' || $agent->departement=='07' ? 'selected' : null}}>07 - Ardèche - Privas</option>
                                  <option value="08"  {{old('departement')=='08' || $agent->departement=='08' ? 'selected' : null}}>08 - Ardennes - Charleville-mézières</option>
                                  <option value="09"  {{old('departement')=='09' || $agent->departement=='09' ? 'selected' : null}}>09 - Ariège - Foix</option>
                                  <option value="10"  {{old('departement')=='10' || $agent->departement=='10' ? 'selected' : null}}>10 - Aube - Troyes</option>
                                  <option value="11"  {{old('departement')=='11' || $agent->departement=='11' ? 'selected' : null}}>11 - Aude - Carcassonne</option>
                                  <option value="12"  {{old('departement')=='12' || $agent->departement=='12' ? 'selected' : null}}>12 - Aveyron - Rodez</option>
                                  <option value="13"  {{old('departement')=='13' || $agent->departement=='13' ? 'selected' : null}}>13 - Bouches-du-Rhône - Marseille</option>
                                  <option value="14"  {{old('departement')=='14' || $agent->departement=='14' ? 'selected' : null}}>14 - Calvados - Caen</option>
                                  <option value="15"  {{old('departement')=='15' || $agent->departement=='15' ? 'selected' : null}}>15 - Cantal - Aurillac</option>
                                  <option value="16"  {{old('departement')=='16' || $agent->departement=='16' ? 'selected' : null}}>16 - Charente - Angoulême</option>
                                  <option value="17"  {{old('departement')=='17' || $agent->departement=='17' ? 'selected' : null}}>17 - Charente-maritime - La rochelle</option>
                                  <option value="18"  {{old('departement')=='18' || $agent->departement=='18' ? 'selected' : null}}>18 - Cher - Bourges</option>
                                  <option value="19"  {{old('departement')=='19' || $agent->departement=='19' ? 'selected' : null}}>19 - Corrèze - Tulle</option>
                                  <option value="2a"  {{old('departement')=='2a' || $agent->departement=='2a' ? 'selected' : null}}>2a - Corse-du-sud - Ajaccio</option>
                                  <option value="2b"  {{old('departement')=='2b' || $agent->departement=='2b' ? 'selected' : null}}>2b - Haute-Corse - Bastia</option>
                                  <option value="21"  {{old('departement')=='21' || $agent->departement=='21' ? 'selected' : null}}>21 - Côte-d'Or - Dijon</option>
                                  <option value="22"  {{old('departement')=='22' || $agent->departement=='22' ? 'selected' : null}}>22 - Côtes-d'Armor - Saint-brieuc</option>
                                  <option value="23"  {{old('departement')=='23' || $agent->departement=='23' ? 'selected' : null}}>23 - Creuse - Guéret</option>
                                  <option value="24"  {{old('departement')=='24' || $agent->departement=='24' ? 'selected' : null}}>24 - Dordogne - Périgueux</option>
                                  <option value="25"  {{old('departement')=='25' || $agent->departement=='25' ? 'selected' : null}}>25 - Doubs - Besançon</option>
                                  <option value="26"  {{old('departement')=='26' || $agent->departement=='26' ? 'selected' : null}}>26 - Drôme - Valence</option>
                                  <option value="27"  {{old('departement')=='27' || $agent->departement=='27' ? 'selected' : null}}>27 - Eure - Évreux</option>
                                  <option value="28"  {{old('departement')=='28' || $agent->departement=='28' ? 'selected' : null}}>28 - Eure-et-loir - Chartres</option>
                                  <option value="29"  {{old('departement')=='29' || $agent->departement=='29' ? 'selected' : null}}>29 - Finistère - Quimper</option>
                                  <option value="30"  {{old('departement')=='30' || $agent->departement=='30' ? 'selected' : null}}>30 - Gard - Nîmes</option>
                                  <option value="31"  {{old('departement')=='31' || $agent->departement=='31' ? 'selected' : null}}>31 - Haute-garonne - Toulouse</option>
                                  <option value="32"  {{old('departement')=='32' || $agent->departement=='32' ? 'selected' : null}}>32 - Gers - Auch</option>
                                  <option value="33"  {{old('departement')=='33' || $agent->departement=='33' ? 'selected' : null}}>33 - Gironde - Bordeaux</option>
                                  <option value="34"  {{old('departement')=='34' || $agent->departement=='34' ? 'selected' : null}}>34 - Hérault - Montpellier</option>
                                  <option value="35"  {{old('departement')=='35' || $agent->departement=='35' ? 'selected' : null}}>35 - Ille-et-vilaine - Rennes</option>
                                  <option value="36"  {{old('departement')=='36' || $agent->departement=='36' ? 'selected' : null}}>36 - Indre - Châteauroux</option>
                                  <option value="37"  {{old('departement')=='37' || $agent->departement=='37' ? 'selected' : null}}>37 - Indre-et-loire - Tours</option>
                                  <option value="38"  {{old('departement')=='38' || $agent->departement=='38' ? 'selected' : null}}>38 - Isère - Grenoble</option>
                                  <option value="39"  {{old('departement')=='39' || $agent->departement=='39' ? 'selected' : null}}>39 - Jura - Lons-le-saunier</option>
                                  <option value="40"  {{old('departement')=='40' || $agent->departement=='40' ? 'selected' : null}}>40 - Landes - Mont-de-marsan</option>
                                  <option value="41"  {{old('departement')=='41' || $agent->departement=='41' ? 'selected' : null}}>41 - Loir-et-cher - Blois</option>
                                  <option value="42"  {{old('departement')=='42' || $agent->departement=='42' ? 'selected' : null}}>42 - Loire - Saint-étienne</option>
                                  <option value="43"  {{old('departement')=='43' || $agent->departement=='43' ? 'selected' : null}}>43 - Haute-loire - Le puy-en-velay</option>
                                  <option value="44"  {{old('departement')=='44' || $agent->departement=='44' ? 'selected' : null}}>44 - Loire-atlantique - Nantes</option>
                                  <option value="45"  {{old('departement')=='45' || $agent->departement=='45' ? 'selected' : null}}>45 - Loiret - Orléans</option>
                                  <option value="46"  {{old('departement')=='46' || $agent->departement=='46' ? 'selected' : null}}>46 - Lot - Cahors</option>
                                  <option value="47"  {{old('departement')=='47' || $agent->departement=='47' ? 'selected' : null}}>47 - Lot-et-garonne - Agen</option>
                                  <option value="48"  {{old('departement')=='48' || $agent->departement=='48' ? 'selected' : null}}>48 - Lozère - Mende</option>
                                  <option value="49"  {{old('departement')=='49' || $agent->departement=='49' ? 'selected' : null}}>49 - Maine-et-loire - Angers</option>
                                  <option value="50"  {{old('departement')=='50' || $agent->departement=='50' ? 'selected' : null}}>50 - Manche - Saint-lô</option>
                                  <option value="51"  {{old('departement')=='51' || $agent->departement=='51' ? 'selected' : null}}>51 - Marne - Châlons-en-champagne</option>
                                  <option value="52"  {{old('departement')=='52' || $agent->departement=='52' ? 'selected' : null}}>52 - Haute-marne - Chaumont</option>
                                  <option value="53"  {{old('departement')=='53' || $agent->departement=='53' ? 'selected' : null}}>53 - Mayenne - Laval</option>
                                  <option value="54"  {{old('departement')=='54' || $agent->departement=='54' ? 'selected' : null}}>54 - Meurthe-et-moselle - Nancy</option>
                                  <option value="55"  {{old('departement')=='55' || $agent->departement=='55' ? 'selected' : null}}>55 - Meuse - Bar-le-duc</option>
                                  <option value="56"  {{old('departement')=='56' || $agent->departement=='56' ? 'selected' : null}}>56 - Morbihan - Vannes</option>
                                  <option value="57"  {{old('departement')=='57' || $agent->departement=='57' ? 'selected' : null}}>57 - Moselle - Metz</option>
                                  <option value="58"  {{old('departement')=='58' || $agent->departement=='58' ? 'selected' : null}}>58 - Nièvre - Nevers</option>
                                  <option value="59"  {{old('departement')=='59' || $agent->departement=='59' ? 'selected' : null}}>59 - Nord - Lille</option>
                                  <option value="60"  {{old('departement')=='60' || $agent->departement=='60' ? 'selected' : null}}>60 - Oise - Beauvais</option>
                                  <option value="61"  {{old('departement')=='61' || $agent->departement=='61' ? 'selected' : null}}>61 - Orne - Alençon</option>
                                  <option value="62"  {{old('departement')=='62' || $agent->departement=='62' ? 'selected' : null}}>62 - Pas-de-calais - Arras</option>
                                  <option value="63"  {{old('departement')=='63' || $agent->departement=='63' ? 'selected' : null}}>63 - Puy-de-dôme - Clermont-ferrand</option>
                                  <option value="64"  {{old('departement')=='64' || $agent->departement=='64' ? 'selected' : null}}>64 - Pyrénées-atlantiques - Pau</option>
                                  <option value="65"  {{old('departement')=='65' || $agent->departement=='65' ? 'selected' : null}}>65 - Hautes-Pyrénées - Tarbes</option>
                                  <option value="66"  {{old('departement')=='66' || $agent->departement=='66' ? 'selected' : null}}>66 - Pyrénées-orientales - Perpignan</option>
                                  <option value="67"  {{old('departement')=='67' || $agent->departement=='67' ? 'selected' : null}}>67 - Bas-rhin - Strasbourg</option>
                                  <option value="68"  {{old('departement')=='68' || $agent->departement=='68' ? 'selected' : null}}>68 - Haut-rhin - Colmar</option>
                                  <option value="69"  {{old('departement')=='69' || $agent->departement=='69' ? 'selected' : null}}>69 - Rhône - Lyon</option>
                                  <option value="70"  {{old('departement')=='70' || $agent->departement=='70' ? 'selected' : null}}>70 - Haute-saône - Vesoul</option>
                                  <option value="71"  {{old('departement')=='71' || $agent->departement=='71' ? 'selected' : null}}>71 - Saône-et-loire - Mâcon</option>
                                  <option value="72"  {{old('departement')=='72' || $agent->departement=='72' ? 'selected' : null}}>72 - Sarthe - Le mans</option>
                                  <option value="73"  {{old('departement')=='73' || $agent->departement=='73' ? 'selected' : null}}>73 - Savoie - Chambéry</option>
                                  <option value="74"  {{old('departement')=='74' || $agent->departement=='74' ? 'selected' : null}}>74 - Haute-savoie - Annecy</option>
                                  <option value="75"  {{old('departement')=='75' || $agent->departement=='75' ? 'selected' : null}}>75 - Paris - Paris</option>
                                  <option value="76"  {{old('departement')=='76' || $agent->departement=='76' ? 'selected' : null}}>76 - Seine-maritime - Rouen</option>
                                  <option value="77"  {{old('departement')=='77' || $agent->departement=='77' ? 'selected' : null}}>77 - Seine-et-marne - Melun</option>
                                  <option value="78"  {{old('departement')=='78' || $agent->departement=='78' ? 'selected' : null}}>78 - Yvelines - Versailles</option>
                                  <option value="79"  {{old('departement')=='79' || $agent->departement=='79' ? 'selected' : null}}>79 - Deux-sèvres - Niort</option>
                                  <option value="80"  {{old('departement')=='80' || $agent->departement=='80' ? 'selected' : null}}>80 - Somme - Amiens</option>
                                  <option value="81"  {{old('departement')=='81' || $agent->departement=='81' ? 'selected' : null}}>81 - Tarn - Albi</option>
                                  <option value="82"  {{old('departement')=='82' || $agent->departement=='82' ? 'selected' : null}}>82 - Tarn-et-garonne - Montauban</option>
                                  <option value="83"  {{old('departement')=='83' || $agent->departement=='83' ? 'selected' : null}}>83 - Var - Toulon</option>
                                  <option value="84"  {{old('departement')=='84' || $agent->departement=='84' ? 'selected' : null}}>84 - Vaucluse - Avignon</option>
                                  <option value="85"  {{old('departement')=='85' || $agent->departement=='85' ? 'selected' : null}}>85 - Vendée - La roche-sur-yon</option>
                                  <option value="86"  {{old('departement')=='86' || $agent->departement=='86' ? 'selected' : null}}>86 - Vienne - Poitiers</option>
                                  <option value="87"  {{old('departement')=='87' || $agent->departement=='87' ? 'selected' : null}}>87 - Haute-vienne - Limoges</option>
                                  <option value="88"  {{old('departement')=='88' || $agent->departement=='88' ? 'selected' : null}}>88 - Vosges - Épinal</option>
                                  <option value="89"  {{old('departement')=='89' || $agent->departement=='89' ? 'selected' : null}}>89 - Yonne - Auxerre</option>
                                  <option value="90"  {{old('departement')=='90' || $agent->departement=='90' ? 'selected' : null}}>90 - Territoire de belfort - Belfort</option>
                                  <option value="91"  {{old('departement')=='91' || $agent->departement=='91' ? 'selected' : null}}>91 - Essonne - Évry</option>
                                  <option value="92"  {{old('departement')=='92' || $agent->departement=='92' ? 'selected' : null}}>92 - Hauts-de-seine - Nanterre</option>
                                  <option value="93"  {{old('departement')=='93' || $agent->departement=='93' ? 'selected' : null}}>93 - Seine-Saint-Denis - Bobigny</option>
                                  <option value="94"  {{old('departement')=='94' || $agent->departement=='94' ? 'selected' : null}}>94 - Val-de-marne - Créteil</option>
                                  <option value="95"  {{old('departement')=='95' || $agent->departement=='95' ? 'selected' : null}}>95 - Val-d'oise - Pontoise</option>
                                  <option value="971"  {{old('departement')=='971' || $agent->departement=='971' ? 'selected' : null}}>971 - Guadeloupe - Basse-terre</option>
                                  <option value="972"  {{old('departement')=='972' || $agent->departement=='972' ? 'selected' : null}}>972 - Martinique - Fort-de-france</option>
                                  <option value="973"  {{old('departement')=='973' || $agent->departement=='973' ? 'selected' : null}}>973 - Guyane - Cayenne</option>
                                  <option value="974"  {{old('departement')=='974' || $agent->departement=='974' ? 'selected' : null}}>974 - La réunion - Saint-denis</option>
                                  <option value="976"  {{old('departement')=='976' || $agent->departement=='976' ? 'selected' : null}}>976 - Mayotte - Dzaoudzi</option>
                                @error('departement')
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                                @enderror
                              </select>
                              </div>
                              <div class="form-group adressegeo @error('adressegeo')  has-error @enderror">
                                <label>Adresse géographique</label>
                                <input name="adressegeo" type="text" class="form-control"  placeholder="Entrer l'adresse géographique" value="{{old('adressegeo') ?: $agent->adressegeo}}">
                                @error('adressegeo')
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                                @enderror
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group numeromobile @error('numeromobile')  has-error @enderror">
                                <label>Numéro Mobile</label>
                                <input name="numeromobile" type="text" class="form-control"  placeholder="Entrer le numéro mobile" value="{{old('numeromobile') ?: $agent->numeromobile}}">
                                @error('numeromobile')
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                                @enderror
                              </div>
                              <div class="form-group numerofixe @error('numerofixe')  has-error @enderror">
                                <label>Numéro Fixe</label>
                                <input name="numerofixe" type="text" class="form-control"  placeholder="Entrer le numéro fixe" value="{{old('numerofixe') ?: $agent->numerofixe}}">
                                @error('numerofixe')
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                                @enderror
                              </div>
                              <div class="form-group email @error('email')  has-error @enderror">
                                <label>Adresse Mail</label>
                                <input name="email" type="text" class="form-control"  placeholder="Entrer l'adresse mail" value="{{old('email') ?: $agent->email}}">
                                @error('email')
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                                @enderror
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div style="overflow:auto;margin-right: 26px">
                        <div style="float:right;">
                          <button type="button" class="btn btn-flat btn-primary" id="nextBtn" onclick="getPreviousForm('{{route('agent.createStepOne')}}')">Etape Précédente</button>
                          <button type="button" class="btn btn-flat btn-primary" id="nextBtn" onclick="submitForm('regForm')">Etape Suivante</button>
                      </div>

                      <div style="text-align:center;margin-top:40px;">
                        <span class="step finish"></span>
                        <span class="step active"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                      </div>
                    <!-- /.box-body -->
                    </div>
                  </div>
                  <!-- /.box-body -->
                </form>
              @endsection