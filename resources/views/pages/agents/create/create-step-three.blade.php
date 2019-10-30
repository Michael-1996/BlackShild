            {{-- {{dd(\Session::all())}} --}}
            @extends('pages.agents.create.layout')
            @section('tab')
                                    <!-- form start -->
                <form id="regForm" role="form" action="{{route('agent.postStepThree')}}" method="post">
                @csrf
                  <!-- /.box-header -->
                  <div class="box-body">
                    <div class="box-group" id="accordion">
                      <!-- One "tab" for each step in the form: -->

                      <div class="tab">
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
                                  <option value="FR"  {{old('nationalite')=='FR' ? 'selected' : null}}>Française</option>
                                  <option value="ET" {{old('nationalite')=='ET' ? 'selected' : null}}>Etrangère</option>
                                </select>
                                @error('nationalite')
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                                @enderror
                              </div>
                              <div class="form-group @error('numeropermis')  has-error @enderror">
                                <label>Numéro de permis de conduire</label>
                                <input name="numeropermis" type="text" class="form-control"  placeholder="Entrer le numéro de permis de conduire" value="{{old('numeropermis') ?: ''}}">
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
                                  <input type="date" name="dateetablpermis" class="form-control pull-right" id="datepicker" value="{{old('dateetablpermis') ?: ''}}">
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
                                  <input type="date" name="dateexpirpermis" class="form-control pull-right" id="datepicker" value="{{old('dateexpirpermis') ?: ''}}">
                                </div>
                                <!-- /.input group -->
                                @error('dateexpirpermis')
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                                @enderror
                              </div>
                              <div class="form-group @error('categoriepermis')  has-error @enderror">
                                <label>Catégorie du permis</label>
                                <select name="categoriepermis[]" class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                  <option value="AM" {{in_array('AM',old('categoriepermis') ?: array()) ? 'selected' : null}}>Catégorie AM</option>
                                  <option value="A" {{in_array('A',old('categoriepermis') ?: array()) ? 'selected' : null}}>Permis A</option>
                                  <option value="A1" {{in_array('A1',old('categoriepermis') ?: array()) ? 'selected' : null}}>Permis A1</option>
                                  <option value="A2" {{in_array('A2',old('categoriepermis') ?: array()) ? 'selected' : null}}>Permis A2</option>
                                  <option value="B" {{in_array('B',old('categoriepermis') ?: array()) ? 'selected' : null}}>Permis B</option>
                                  <option value="B1" {{in_array('B1',old('categoriepermis') ?: array()) ? 'selected' : null}}>Permis B1</option>
                                  <option value="BE" {{in_array('BE',old('categoriepermis') ?: array()) ? 'selected' : null}}>Permis BE</option>
                                  <option value="C" {{in_array('C',old('categoriepermis') ?: array()) ? 'selected' : null}}>Permis C</option>
                                  <option value="C1" {{in_array('C1',old('categoriepermis') ?: array()) ? 'selected' : null}}>Permis C1</option>
                                  <option value="CE" {{in_array('CE',old('categoriepermis') ?: array()) ? 'selected' : null}}>Permis CE</option>
                                  <option value="C1E" {{in_array('C1E',old('categoriepermis') ?: array()) ? 'selected' : null}}>Permis C1E</option>
                                  <option value="D" {{in_array('D',old('categoriepermis') ?: array()) ? 'selected' : null}}>Permis D</option>
                                  <option value="D1" {{in_array('D1',old('categoriepermis') ?: array()) ? 'selected' : null}}>Permis D1</option>
                                  <option value="DE" {{in_array('DE',old('categoriepermis') ?: array()) ? 'selected' : null}}>Permis DE</option>
                                  <option value="D1E" {{in_array('D1E',old('categoriepermis') ?: array()) ? 'selected' : null}}>Permis D1E</option>
                                </select>
                                @error('categoriepermis')
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                                @enderror
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group @error('numerocni')  has-error @enderror" id="div_carteidentite">
                                <label>Numéro CNI</label>
                                <input name="numerocni" type="text" class="form-control"  placeholder="Entrer le numéro CNI" value="{{old('numerocni') ?: ''}}">
                                @error('numerocni')
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                                @enderror
                              </div>
                              <div class="form-group @error('dateexpircni')  has-error @enderror" id="div_dateexpircni">
                                <label>Date d'expiration CNI</label>
                                <input name="dateexpircni" type="date" class="form-control" value="{{old('dateexpircni') ?: ''}}">
                                @error('dateexpircni')
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                                @enderror
                              </div>
                              <div class="form-group @error('numeroetranger')  has-error @enderror" id="div_numeroetranger" style="display: none">
                                <label>Numéro étranger</label>
                                <input name="numeroetranger" type="text" class="form-control"  placeholder="Entrer le numéro étranger" value="{{old('numeroetranger') ?: ''}}">
                                @error('numeroetranger')
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                                @enderror
                              </div>
                              <div class="form-group @error('lieudelivrancecs')  has-error @enderror" id="div_lieudelivrancecs" style="display: none">
                                <label>Lieu de délivrance de la carte de séjour</label>
                                <input name="lieudelivrancecs" type="text" class="form-control"  placeholder="Entrer le lieux de délivrance de la carte" value="{{old('lieudelivrancecs') ?: ''}}">
                                @error('lieudelivrancecs')
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                                @enderror
                              </div>
                              <div class="form-group @error('etablissementcartedesejour')  has-error @enderror" id="div_etablissementcartedesejour" style="display: none">
                                <label>Date d'etablissement de la carte de séjour</label>
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="date" name="etablissementcartedesejour" class="form-control pull-right" id="datepicker" value="{{old('etablissementcartedesejour') ?: ''}}">
                                </div>
                                <!-- /.input group -->
                                @error('etablissementcartedesejour')
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                                @enderror
                              </div>
                              <div class="form-group @error('expirationcartedesejour')  has-error @enderror" id="div_expirationcartedesejour" style="display: none">
                                <label>Date d'expiration de la carte de séjour</label>
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="date" name="expirationcartedesejour" class="form-control pull-right" id="datepicker" value="{{old('expirationcartedesejour') ?: ''}}">
                                </div>
                                <!-- /.input group -->
                                @error('expirationcartedesejour')
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                                @enderror
                              </div>
                              <div class="form-group @error('numeross')  has-error @enderror" id="div_lieudelivrance">
                                <label>Numéro de sécurité social</label>
                                <input name="numeross" type="text" class="form-control"  placeholder="Entrer le numéro de sécurité social" value="{{old('numeross') ?: ''}}">
                                @error('numeross')
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                                @enderror
                              </div>
                              <div class="form-group @error('numeroalf')  has-error @enderror">
                                <label>Numéro d'allocation familiale</label>
                                <input name="numeroalf" type="text" class="form-control"  placeholder="Entrer le numéro d'allocation familiale" value="{{old('numeroalf') ?: ''}}">
                                @error('numeroalf')
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                                @enderror
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>



                      <div style="overflow:auto;margin-right: 26px">
                        <div style="float:right;">
                          <a href="{{route('agent.createStepTwo')}}"  class="btn btn-flat btn-primary" id="prevBtn"{{--  onclick="nextPrev(-1)" --}}>Précédent</a>
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