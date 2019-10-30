            {{-- {{dd(\Session::all())}} --}}
            @extends('pages.agents.create.layout')
            @section('tab')
                                    <!-- form start -->
                <form id="regForm" role="form" action="{{route('agent.postStepOne')}}" method="post">
                @csrf
                  <!-- /.box-header -->
                  <div class="box-body">
                    <div class="box-group" id="accordion">
                      <!-- One "tab" for each step in the form: -->

                      <div class="tab">
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

                      <div style="overflow:auto;margin-right: 26px">
                        <div style="float:right;">
                          <a href="{{route('agent.createStepOne')}}"  class="btn btn-flat btn-primary" id="prevBtn"{{--  onclick="nextPrev(-1)" --}}>Précédent</a>
                          <button type="submit" class="btn btn-flat btn-primary" id="nextBtn"{{--  onclick="nextPrev(1)" --}}>Suivant</button>
                        </div>
                      </div>

                      <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                      </div>
                    <!-- /.box-body -->
                    </div>
                  </div>
                  <!-- /.box-body -->
                </form>
              @endsection