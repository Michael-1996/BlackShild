                                         
              <div class="close">
                <div class="cs-loader">
                  <div class="cs-loader-inner">
                    <label> ●</label>
                    <label> ●</label>
                    <label> ●</label>
                    <label> ●</label>
                    <label> ●</label>
                    <label> ●</label>
                  </div>
                </div>
              </div>


              <table class="table table-hover">
                <tr>
                  <th>#</th>
                  <th>Nom & Prénoms</th>
                  <th>Date de début</th>
                  <th>Date de fin</th>
                  {{-- <th>Type</th> --}}
                  {{-- <th>Date d'ajout</th> --}}
                  <th>Type Congé</th>
                  <th>Motif</th>
                  <th>Action</th>
                </tr>
                @if(count($conges)>0)
                  @foreach($conges as $conge)
                    <tr>
                      <td>#{{$conge->id}}</td>
                      <td>{{$conge->agent->nom.' '.$conge->agent->prenoms}}</td>
                      <td>{{$conge->date_debut}}</td>
                      <td>{{$conge->date_fin}}</td>
                      <td>
                        @if($conge->typeconge=='annuel')
                          <label class="label label-success">Congé Annuel</label>
                        @elseif($conge->typeconge=='sanssolde')
                          <label class="label label-warning">Congé sans solde</label>
                        @elseif($conge->typeconge=='maladie')
                          <label class="label label-danger">Congé Maladie</label>
                        @elseif($conge->typeconge=='formation')
                          <label class="label label-primary">Congé de Formation</label>
                        @elseif($conge->typeconge=='maternite')
                          <label class="label label-info">Congé de Maternité / Paternité</label>
                        @elseif($conge->typeconge=='familiale')
                          <label class="label" style="background: #B34EE9">Congé pour des raisons Familiales</label>
                        @else
                          <label class="label label-default">Autre</label>
                        @endif
                      </td>
                      <td>
                        @if(strlen($conge->motif) > 256)
                          {{substr($conge->motif,0,256).'...'}}
                        @else
                          {{$conge->motif}}
                        @endif
                      </td>
                      {{-- <td><span class="label label-success">congé annuel</span></td> --}}
                      <td>
                        <div class="input-group input-group-sm">
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-warning">Action</button>
                            <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu menu">
                              <li><a href="{{route('conge.edit',$conge->id)}}">Afficher</a></li>
                              <li><a href="{{route('conge.edit',$conge->id)}}">Modifier</a></li>
                              <li class="divider"></li>
                              <li><a href="#" data-link="{{route('conge.destroy',$conge->id)}}"  class="text-red"  data-div_refresh="div_conge_table" data-toggle="modal" data-target="#modal-delete-element">Supprimer</a></li>
                            </ul>
                          </div>
                        </div>
                      </td>                
                    </tr>
                  @endforeach
                @endif
              </table>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>