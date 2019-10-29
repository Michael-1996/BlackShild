              <form id="form-create-planning" action="{{route('planning.store')}}" method="post">
                @csrf
                <!-- /. box -->
                <div class="box box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">Créer un Planning</h3>
                  </div>
                  <div class="box-body">
                    <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                      <div class="form-group site">
                        <label>Site</label>
                        <select name="site" class="form-control select2" style="width: 100%;">
                            <option value="" >Choisir un site</option>
                            @if(count($sites)>0)
                              @foreach($sites as $site)
                                <option value="{{$site->id}}" {{old('site')==$site->id ? 'selected' : null}}>{{$site->nom}}</option>
                              @endforeach
                            @endif
                        </select>
                        @error('site')
                            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                        @enderror
                      </div>

                      <div class="form-group agent @error('agent')  has-error @enderror">
                        <label>Agent</label>
                        <input type="hidden" name="agent" value="{{$agent->id}}">
                        <select name="" class="form-control select2" style="width: 100%;" disabled>
                          <option value="">Choisir l'agent</option>
                          <option value="{{$agent->id}}" selected>{{$agent->nom.' '.$agent->prenoms}}</option>
                            {{-- @if(count($agents)>0)
                              @foreach($agents as $agent)
                                <option value="{{$agent->id}}"  {{old('agent')==$agent->id ? 'selected' : null}}>{{$agent->nom.' '.$agent->prenoms}}</option>
                              @endforeach
                            @endif --}}
                        </select>
                        @error('agent')
                            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                        @enderror
                      </div>
                      <div class="form-row">
                        <div class="form-group date_debut col-md-6 @error('date_debut')  has-error @enderror" style="padding-left: 0px">
                          <label for="inputEmail4">Du</label>
                          <input name="date_debut" type="date" class="form-control" id="inputEmail4" placeholder="Email" value="{{old('date_debut') ?: ''}}">
                          @error('date_debut')
                              <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                          @enderror
                        </div>
                        <div class="form-group date_fin col-md-6 @error('date_fin')  has-error @enderror" style="padding-right: 0px">
                          <label for="inputPassword4">Au</label>
                          <input name="date_fin" type="date" class="form-control" id="inputPassword4" placeholder="Password" value="{{old('date_fin') ?: ''}}">
                          @error('date_fin')
                              <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                          @enderror
                        </div>
                      </div> 
                      <div class="form-group form-check">
                        <input name="jourferie" type="checkbox" class="form-check-input" id="jourferie">
                        <label class="form-check-label" for="jourferie" style="cursor: pointer;">Jour férié</label>
                      </div>
                      <div class="form-row">
                        <div class="form-group heure_debut col-md-6 @error('heure_debut')  has-error @enderror" style="padding-left: 0px">
                          <label for="inputEmail4">De</label>
                          <input id="heure_debut" name="heure_debut" type="text" class="time-picker form-control" placeholder="Heure Début" value="{{old('heure_debut') ?: ''}}" readonly style="background: white">
                          @error('heure_debut')
                              <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                          @enderror
                        </div>
                        <div class="form-group heure_fin col-md-6 @error('heure_fin')  has-error @enderror" style="padding-right: 0px">
                          <label for="inputPassword4">A</label>
                          <input id="heure_fin" name="heure_fin" type="text" class="time-picker form-control" placeholder="Heure Fin" value="{{old('heure_fin') ?: ''}}" readonly style="background: white">
                          @error('heure_fin')
                              <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                          @enderror
                        </div>
                      </div> 
                    </div>
                    <!-- /btn-group -->
                    <div class="input-group pull-right">
                        <button type="button" class="btn btn-primary btn-flat" onclick="creerPlanning()">Ajouter</button>
                      <!-- /btn-group -->
                    </div>
                    <!-- /input-group -->
                  </div>
                </div>
                <!-- /.col -->
              </form>