              <form id="form-create-planning" action="{{route('planning.update',$planning->id)}}" method="post">
                @csrf
                @method('PATCH')
                <!-- /. box -->
                <div class="box box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">Modifier un Planning</h3>
                  </div>
                  <div class="box-body">
                    <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                      <div class="form-group site">
                        <label>Site</label>
                        <select name="site" class="form-control select2" style="width: 100%;">
                            <option value="" >Choisir un site</option>
                            @if(count($sites)>0)
                              @foreach($sites as $site)
                                <option value="{{$site->id}}" {{$site->id==$planning->site->id ? 'selected' : null}}>{{$site->nom}}</option>
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
                          <input name="date_debut" type="date" class="form-control" placeholder="Email" value="{{old('date_debut') ?: $planning->date_debut}}">
                          @error('date_debut')
                              <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                          @enderror
                        </div>
                        <div class="form-group date_fin col-md-6 @error('date_fin')  has-error @enderror" style="padding-right: 0px">
                          <label for="inputPassword4">Au</label>
                          <input name="date_fin" type="date" class="form-control" id="inputPassword4" placeholder="Password" value="{{old('date_fin') ?: $planning->date_fin}}">
                          @error('date_fin')
                              <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                          @enderror
                        </div>
                      </div> 
                      <div class="form-row">
                        <div class="form-group heure_debut col-md-6 @error('heure_debut')  has-error @enderror" style="padding-left: 0px">
                          <label for="inputEmail4">De</label>
                          <input id="heure_debut_m" name="heure_debut" type="text" class="form-control" placeholder="Heure Début" value="{{old('heure_debut') ?: $planning->heure_debut}}">
                          @error('heure_debut')
                              <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                          @enderror
                        </div>
                        <div class="form-group heure_fin col-md-6 @error('heure_fin')  has-error @enderror" style="padding-right: 0px">
                          <label for="inputPassword4">A</label>
                          <input id="heure_fin_m" name="heure_fin" type="text" class="form-control" placeholder="Heure Fin" value="{{old('heure_fin') ?: $planning->heure_fin}}">
                          @error('heure_fin')
                              <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                          @enderror
                        </div>
                      </div> 
                    </div>
                    <!-- /btn-group -->
                    <div class="input-group pull-left">
                        <button type="button" onClick="showCreateForm({{$agent->id}})" class="btn btn-danger btn-flat btn-add-planning-submit pull-left">Annuler</button>
                      <!-- /btn-group -->
                    </div>
                    <div class="input-group pull-right">
                        <button type="button" class="btn btn-primary btn-flat btn-add-planning-submit" onclick="updatePlanning({{$planning->id}})">Modifier</button>
                      <!-- /btn-group -->
                    </div>
                    <!-- /input-group -->
                  </div>
                </div>
                <!-- /.col -->
              </form>


              <script type="text/javascript">
                          var MyTimePicker = new TimePicker(['heure_debut_m', 'heure_fin_m'], {
            lang: 'en',
            theme: 'dark'
          });
          MyTimePicker.on('change', function(evt) {
            
            var value = (evt.hour || '00') + ':' + (evt.minute || '00');
            evt.element.value = value;

          });
              </script>