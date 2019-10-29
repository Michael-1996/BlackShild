@extends('layouts.app')

@section('head')
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('')}}plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('')}}bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('')}}plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('')}}bower_components/select2/dist/css/select2.min.css">
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  {{-- <div class="content-wrapper"> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Modifier les informations de l'Agent
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li><a href="#">Gere les agents</a></li>
        <li class="active">Modifier</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
            <!-- SELECT2 EXAMPLE -->

      <!-- /.box -->

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Fiche Agent</h3>
                <!-- START ACCORDION & CAROUSEL-->

      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
            </div>
            <!-- form start -->
            <form role="form" action="{{route('agent.update',$agent->id)}}" method="post">
            @csrf
            @method('patch')
              <!-- /.box-header -->
              <div class="box-body">
                <div class="box-group" id="accordion">
                  <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                  <div class="panel box box-warning">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                          Identité  #1
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse">
                      <div class="box-body">
                        <div class="col-md-6">
                          <div class="form-group @error('civilite')  has-error @enderror">
                            <label>Civilité</label>
                            <select class="form-control" name="civilite">
                              <option value="sana">Choisir le genre</option>
                              <option value="M" {{old('civilite')=='M' || $agent->civilite=='M' ? 'selected' : null}}>Monsieur</option>
                              <option value="Mll" {{old('civilite')=='Mll' || $agent->civilite=='Mll' ? 'selected' : null}}>Madémoiselle</option>
                              <option value="Mme" {{old('civilite')=='Mme' || $agent->civilite=='Mme' ? 'selected' : null}}>Madame</option>
                            </select>
                            @error('civilite')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group @error('nom')  has-error @enderror">
                            <label>Nom</label>
                            <input name="nom" type="text" class="form-control"  placeholder="Entrer le nom" value="{{old('nom') ?: $agent->nom}}">
                            @error('nom')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group @error('datenaissance')  has-error @enderror">
                            <label>Date de naissance:</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="date" name="datenaissance" class="form-control pull-right" id="datepicker" value="{{old('datenaissance') ?: $agent->datenaissance}}">
                            </div>
                            <!-- /.input group -->
                            @error('datenaissance')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group @error('statutmatrimonial')  has-error @enderror">
                            <label>Statut Matrimoniale</label>
                            <select class="form-control" name="statutmatrimonial">
                              <option value="">Choisir le statut</option>
                              <option value="mar" {{old('statutmatrimonial')=='mar' || $agent->statutmatrimonial=='mar' ? 'selected' : null}}>Marié(e)</option>
                              <option value="cel" {{old('statutmatrimonial')=='cel' || $agent->statutmatrimonial=='cel' ? 'selected' : null}}>Célibataire</option>
                              <option value="veuf" {{old('statutmatrimonial')=='veuf' || $agent->statutmatrimonial=='veuf' ? 'selected' : null}}>Veuf(ve)</option>
                            </select>
                            @error('statutmatrimonial')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group @error('prenoms')  has-error @enderror">
                            <label>Prénoms</label>
                            <input name="prenoms" type="text" class="form-control"  placeholder="Entrer le Prénom" value="{{old('prenoms') ?: $agent->prenoms}}">
                            @error('prenoms')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group @error('matricule')  has-error @enderror">
                            <label>Matricule</label>
                            <input name="matricule" type="text" class="form-control"  placeholder="Entrer le Matricule" value="{{old('matricule') ?: $agent->matricule}}">
                            @error('matricule')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel box box-warning">
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
                          <div class="form-group @error('codepostal')  has-error @enderror">
                            <label>Code postal</label>
                            <input name="codepostal" type="text" class="form-control"  placeholder="Entrer le code postal" value="{{old('codepostal') ?:  $agent->codepostal}}">
                            @error('codepostal')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group @error('commune')  has-error @enderror">
                            <label>Commune</label>
                            <input name="commune" type="text" class="form-control"  placeholder="Entrer la commune" value="{{old('commune') ?: $agent->commune}}">
                            @error('commune')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group @error('departement')  has-error @enderror">
                            <label>Département</label>
                            <input name="departement" type="text" class="form-control"  placeholder="Entrer le département" value="{{old('departement') ?: $agent->departement}}">
                            @error('departement')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group @error('numeromobile')  has-error @enderror">
                            <label>Numéro Mobile</label>
                            <input name="numeromobile" type="text" class="form-control"  placeholder="Entrer le numéro mobile" value="{{old('numeromobile') ?: $agent->numeromobile}}">
                            @error('numeromobile')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group @error('numerofixe')  has-error @enderror">
                            <label>Numéro Fixe</label>
                            <input name="numerofixe" type="text" class="form-control"  placeholder="Entrer le numéro fixe" value="{{old('numerofixe') ?: $agent->numerofixe}}">
                            @error('numerofixe')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group @error('email')  has-error @enderror">
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
                  <div class="panel box box-warning">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                          Informations administratives
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse">
                      <div class="box-body">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Nationalité</label>
                            <select class="form-control" name="nationalite">
                              <option value="FR"  {{old('nationalite')=='FR' || $agent->nationalite=='FR' ? 'selected' : null}}>Française</option>
                              <option value="ET" {{old('nationalite')=='ET' || $agent->nationalite=='ET' ? 'selected' : null}}>Etrangère</option>
                            </select>
                            @error('nationalite')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group @error('numeropermis')  has-error @enderror">
                            <label>Numéro de permis de conduire</label>
                            <input name="numeropermis" type="text" class="form-control"  placeholder="Entrer le numéro de permis de conduire" value="{{old('numeropermis') ?: $agent->numeropermis}}">
                            @error('numeropermis')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group @error('dateetablpermis')  has-error @enderror">
                            <label>Date détablissement du permis</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="date" name="dateetablpermis" class="form-control pull-right" id="datepicker" value="{{old('dateetablpermis') ?: $agent->dateetablpermis}}">
                            </div>
                            <!-- /.input group -->
                            @error('dateetablpermis')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group @error('dateexpirpermis')  has-error @enderror">
                            <label>Date d'expiration du permis</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="date" name="dateexpirpermis" class="form-control pull-right" id="datepicker" value="{{old('dateexpirpermis') ?: $agent->dateexpirpermis}}">
                            </div>
                            <!-- /.input group -->
                            @error('dateexpirpermis')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group @error('categoriepermis')  has-error @enderror">
                            <label>Catégorie du permis</label>
                            <select name="categoriepermis[]" class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                              <option value="AM" {{in_array('AM',old('categoriepermis') ?: array()) || in_array('AM',$categoriepermisArray ?: array()) ? 'selected' : null}}>Catégorie AM</option>
                              <option value="A" {{in_array('A',old('categoriepermis') ?: array()) || in_array('A',$categoriepermisArray ?: array()) ? 'selected' : null}}>Permis A</option>
                              <option value="A1" {{in_array('A1',old('categoriepermis') ?: array()) || in_array('A1',$categoriepermisArray ?: array()) ? 'selected' : null}}>Permis A1</option>
                              <option value="A2" {{in_array('A2',old('categoriepermis') ?: array()) || in_array('A2',$categoriepermisArray ?: array()) ? 'selected' : null}}>Permis A2</option>
                              <option value="B" {{in_array('B',old('categoriepermis') ?: array()) || in_array('B',$categoriepermisArray ?: array()) ? 'selected' : null}}>Permis B</option>
                              <option value="B1" {{in_array('B1',old('categoriepermis') ?: array()) || in_array('B1',$categoriepermisArray ?: array()) ? 'selected' : null}}>Permis B1</option>
                              <option value="BE" {{in_array('BE',old('categoriepermis') ?: array()) || in_array('BE',$categoriepermisArray ?: array()) ? 'selected' : null}}>Permis BE</option>
                              <option value="C" {{in_array('C',old('categoriepermis') ?: array()) || in_array('C',$categoriepermisArray ?: array()) ? 'selected' : null}}>Permis C</option>
                              <option value="C1" {{in_array('C1',old('categoriepermis') ?: array()) || in_array('C1',$categoriepermisArray ?: array()) ? 'selected' : null}}>Permis C1</option>
                              <option value="CE" {{in_array('CE',old('categoriepermis') ?: array()) || in_array('CE',$categoriepermisArray ?: array()) ? 'selected' : null}}>Permis CE</option>
                              <option value="C1E" {{in_array('C1E',old('categoriepermis') ?: array()) || in_array('C1E',$categoriepermisArray ?: array()) ? 'selected' : null}}>Permis C1E</option>
                              <option value="D" {{in_array('D',old('categoriepermis') ?: array()) || in_array('D',$categoriepermisArray ?: array()) ? 'selected' : null}}>Permis D</option>
                              <option value="D1" {{in_array('D1',old('categoriepermis') ?: array()) || in_array('D1',$categoriepermisArray ?: array()) ? 'selected' : null}}>Permis D1</option>
                              <option value="DE" {{in_array('DE',old('categoriepermis') ?: array()) || in_array('DE',$categoriepermisArray ?: array()) ? 'selected' : null}}>Permis DE</option>
                              <option value="D1E" {{in_array('D1E',old('categoriepermis') ?: array()) || in_array('D1E',$categoriepermisArray ?: array()) ? 'selected' : null}}>Permis D1E</option>
                            </select>
                            @error('categoriepermis')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group @error('numerocni')  has-error @enderror" id="div_carteidentite">
                            <label>Numéro CNI</label>
                            <input name="numerocni" type="text" class="form-control"  placeholder="Entrer le numéro CNI" value="{{old('numerocni') ?: $agent->numerocni}}">
                            @error('numerocni')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group @error('dateexpircni')  has-error @enderror" id="div_dateexpircni">
                            <label>Date d'expiration CNI</label>
                            <input name="dateexpircni" type="date" class="form-control" value="{{old('dateexpircni') ?: $agent->dateexpircni}}">
                            @error('dateexpircni')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group @error('numeroetranger')  has-error @enderror" id="div_numeroetranger">
                            <label>Numéro étranger</label>
                            <input name="numeroetranger" type="text" class="form-control"  placeholder="Entrer le numéro étranger" value="{{old('numeroetranger') ?: $agent->numeroetranger}}">
                            @error('numeroetranger')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group @error('lieudelivrancecs')  has-error @enderror" id="div_lieudelivrancecs">
                            <label>Lieu de délivrance de la carte de séjour</label>
                            <input name="lieudelivrancecs" type="text" class="form-control"  placeholder="Entrer le lieux de délivrance de la carte" value="{{old('lieudelivrancecs') ?: $agent->lieudelivrancecs}}">
                            @error('lieudelivrancecs')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group @error('etablissementcartedesejour')  has-error @enderror" id="div_etablissementcartedesejour">
                            <label>Date d'etablissement de la carte de séjour</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="date" name="etablissementcartedesejour" class="form-control pull-right" id="datepicker" value="{{old('etablissementcartedesejour') ?: $agent->etablissementcartedesejour}}">
                            </div>
                            <!-- /.input group -->
                            @error('etablissementcartedesejour')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group @error('expirationcartedesejour')  has-error @enderror" id="div_expirationcartedesejour">
                            <label>Date d'expiration de la carte de séjour</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="date" name="expirationcartedesejour" class="form-control pull-right" id="datepicker" value="{{old('expirationcartedesejour') ?: $agent->expirationcartedesejour}}">
                            </div>
                            <!-- /.input group -->
                            @error('expirationcartedesejour')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group @error('numeross')  has-error @enderror" id="div_lieudelivrance">
                            <label>Numéro de sécurité social</label>
                            <input name="numeross" type="text" class="form-control"  placeholder="Entrer le numéro de sécurité social" value="{{old('numeross') ?: $agent->numeross}}">
                            @error('numeross')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group @error('numeroalf')  has-error @enderror">
                            <label>Numéro d'allocation familiale</label>
                            <input name="numeroalf" type="text" class="form-control" placeholder="Entrer le numéro d'allocation familiale" value="{{old('numeroalf') ?: $agent->numeroalf}}">
                            @error('numeroalf')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="panel box box-warning">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                          Emploi et qualification  #4
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse">
                      <div class="box-body">
                        <div class="col-md-6">
                          <div class="form-group @error('typecontrat')  has-error @enderror">
                            <label>Type de Contrat</label>
                            <select class="form-control" name="typecontrat">
                              <option value="">Choisir le contrat</option>
                              <option value="cdi" {{old('typecontrat')=='cdi' || $agent->typecontrat=='cdi' ? 'selected' : null}}>CDI</option>
                              <option value="cdd" {{old('typecontrat')=='cdd' || $agent->typecontrat=='cdd' ? 'selected' : null}}>CDD</option>
                              <option value="interim" {{old('typecontrat')=='interim' || $agent->typecontrat=='interim' ? 'selected' : null}}>Intérim</option>
                              <option value="essai" {{old('typecontrat')=='essai' || $agent->typecontrat=='essai' ? 'selected' : null}}>Essai</option>
                            </select>
                            @error('typecontrat')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <!-- checkbox -->
                          <div class="form-group">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="ads" {{ old('ads')==='on' || in_array('ads',$qualificationArray ?: array()) ? 'checked' : null}}>
                                ADS
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="maitrechien"  {{ old('categoriepermis')==='on' || in_array('maitrechien',$qualificationArray ?: array()) ? 'checked' : null}}>
                                Maitre chien
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="ssiap1"  {{ old('ssiap1')==='on' || in_array('ssiap1',$qualificationArray ?: array()) ? 'checked' : null}}>
                                SSIAP1
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="ssiap2"  {{ old('categoriepermis')==='on' || in_array('ssiap2',$qualificationArray ?: array()) ? 'checked' : null}}>
                                SSIAP2
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="chefequipe"  {{ old('chefequipe')==='on' || in_array('chefequipe',$qualificationArray ?: array()) ? 'checked' : null}}>
                                Chef d'équipe
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="superviseur"  {{ old('superviseur')==='on' || in_array('superviseur',$qualificationArray ?: array()) ? 'checked' : null}}>
                                Supperviseur
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="commercial"  {{ old('commercial')==='on' || in_array('commercial',$qualificationArray ?: array()) ? 'checked' : null}}>
                                Commercial
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="agentcontrole"  {{ old('agentcontrole')==='on' || in_array('agentcontrole',$qualificationArray ?: array()) ? 'checked' : null}}>
                                Agent de contôle
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group @error('dureeducontrat')  has-error @enderror" id="div_dureeducontrat">
                            <label>Durée du Contrat</label>
                            <select class="form-control" name="dureeducontrat">
                              <option value="">Choisir la durée</option>
                              <option value="3mois" {{old('dureeducontrat')=='3mois' || $agent->dureeducontrat=='3mois' ? 'selected' : null}}>3 Mois</option>
                              <option value="6mois" {{old('dureeducontrat')=='6mois' || $agent->dureeducontrat=='6mois' ? 'selected' : null}}>6 Mois</option>
                              <option value="1ans" {{old('dureeducontrat')=='1ans' || $agent->dureeducontrat=='1ans' ? 'selected' : null}}>1 ans</option>
                              <option value="2ans" {{old('dureeducontrat')=='2ans' || $agent->dureeducontrat=='2ans' ? 'selected' : null}}>2 ans</option>
                            </select>
                            @error('dureeducontrat')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group @error('numeroads')  has-error @enderror" id="div_numeroads">
                            <label>Numéro ADS</label>
                            <input name="numeroads" type="text" class="form-control"  placeholder="Entrer le numéro ADS" value="{{old('numeroads') ?: $agent->numeroads}}">
                            @error('numeroads')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group @error('nomchien')  has-error @enderror" id="div_nomchien">
                            <label>Nom du chien</label>
                            <input name="nomchien" type="text" class="form-control"  placeholder="Entrer le nom du chien" value="{{old('nomchien') ?: $agent->nomchien}}">
                            @error('nomchien')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                          <div class="form-group @error('datevaliditevaccin')  has-error @enderror" id="div_datevaliditevaccin">
                            <label>Date de validité du vaccin</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="date" name="datevaliditevaccin" class="form-control pull-right" id="datepicker" value="{{old('datevaliditevaccin') ?: $agent->datevaliditevaccin}}">
                            </div>
                            <!-- /.input group -->
                            @error('datevaliditevaccin')
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="box-footer pull-right">
                  <button type="submit" class="btn btn-lg btn-primary">Modifier</button>
                </div>
              </div>
              <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  {{-- </div> --}}
  <!-- /.content-wrapper -->
@endsection

@section('script')
<!-- jQuery 3 -->
<!-- Select2 -->
<script src="{{asset('')}}bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="{{asset('')}}plugins/input-mask/jquery.inputmask.js"></script>
<script src="{{asset('')}}plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="{{asset('')}}plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- bootstrap color picker -->
<script src="{{asset('')}}bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="{{asset('')}}plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="{{asset('')}}plugins/iCheck/icheck.min.js"></script>

{{-- <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
 --}}
<script type="text/javascript">
  //Affichae des champ des informations administrative
  var nationalite=$("select[name='nationalite'] :selected")
  var carteidentite=$("#div_carteidentite")
  var numerocarteidentite=$("#div_numerocarteidentite")
  var dateexpircni=$("#div_dateexpircni")
  var numeroetranger=$("#div_numeroetranger")
  var lieudelivrancecs=$("#div_lieudelivrancecs")
  var etablissementcartedesejour=$("#div_etablissementcartedesejour")
  var cartedesejour=$("#div_cartedesejour")
  var expirationcartedesejour=$("#div_expirationcartedesejour")

  $("select[name='nationalite']").change(function(){
    var SelectedValue = $("option:selected", this).val();
    displayElement(SelectedValue)
  })

  displayElement("{{ old('nationalite') ?: 'FR' }}")

  function displayElement(SelectedValue='FR'){
    if(SelectedValue==='FR'){
      //Show
      carteidentite.show(500)
      numerocarteidentite.show(500)
      dateexpircni.show(500)
      //Hide
      numeroetranger.hide(500)
      lieudelivrancecs.hide(500)
      etablissementcartedesejour.hide(500)
      cartedesejour.hide(500)
      expirationcartedesejour.hide(500)
    }else{
      //Show
      numeroetranger.show(500)
      lieudelivrancecs.show(500)
      etablissementcartedesejour.show(500)
      cartedesejour.show(500)
      expirationcartedesejour.show(500)
      //Hide
      carteidentite.hide(500)
      numerocarteidentite.hide(500)
      dateexpircni.hide(500)
    }
  }

</script>

<script type="text/javascript">
  //Affichage des champ de la qualification
  var ads=$("input[name='ads']")
  var maitrechien=$("input[name='maitrechien']")

  ads.change(function(){
    if ($(this).is(':checked')) {
        $("#div_numeroads").show(500)
    } else {
        $("#div_numeroads").hide(500)
    }
  })

  maitrechien.change(function(){
    if ($(this).is(':checked')) {
      $("#div_nomchien").show(500)
      $("#div_datevaliditevaccin").show(500)
    } else {
      $("#div_nomchien").hide(500)
      $("#div_datevaliditevaccin").hide(500)
    }
  })

</script>

<script type="text/javascript">
  //Affichae des champ des informations administrative
  var nationalite=$("select[name='typecontrat'] :selected")
  var div_dureeducontrat=$("#div_dureeducontrat")

  $("select[name='typecontrat']").change(function(){
    var SelectedValue = $("option:selected", this).val();
    displayDureeElement(SelectedValue)
  })

  displayDureeElement("{{ old('typecontrat') ?: 'cdi' }}")

  function displayDureeElement(SelectedValue='cdi'){
    if(SelectedValue==='cdi' || SelectedValue===''){
      //Hide
      div_dureeducontrat.hide(500)
    }else{
      //Show
      div_dureeducontrat.show(500)
    }
  }

</script>
@endsection