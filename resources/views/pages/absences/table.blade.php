                                         
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
                  {{-- <th>Type Congé</th> --}}
                  <th>Motif</th>
                  <th>Action</th>
                </tr>
                @if(count($absences)>0)
                  @foreach($absences as $absence)
                    <tr>
                      <td>#{{$absence->id}}</td>
                      <td>{{$absence->agent->nom.' '.$absence->agent->prenoms}}</td>
                      <td>{{$absence->date_debut}}</td>
                      <td>{{$absence->date_fin}}</td>
{{--                       <td>
                        @if($absence->typeconge=='annuel')
                          <label class="label label-success">Congé Annuel</label>
                        @elseif($absence->typeconge=='sanssolde')
                          <label class="label label-warning">Congé sans solde</label>
                        @elseif($absence->typeconge=='maladie')
                          <label class="label label-danger">Congé Maladie</label>
                        @elseif($absence->typeconge=='formation')
                          <label class="label label-primary">Congé de Formation</label>
                        @elseif($absence->typeconge=='maternite')
                          <label class="label label-info">Congé de Maternité / Paternité</label>
                        @elseif($absence->typeconge=='familiale')
                          <label class="label" style="background: #B34EE9">Congé pour des raisons Familiales</label>
                        @else
                          <label class="label label-default">Autre</label>
                        @endif
                      </td> --}}
                      <td>
                        @if(strlen($absence->motif) > 256)
                          {{substr($absence->motif,0,256).'...'}}
                        @else
                          {{$absence->motif}}
                        @endif
                      </td>
                      {{-- <td><span class="label label-success">congé annuel</span></td> --}}
                      <td>
                        <a href="{{route('absence.edit',$absence->id)}}" class="label label-primary"  data-toggle="tooltip" data-placement="bottom" title="Afficher"><i class="fa fa-eye"></i></a>
                        <a href="{{route('absence.edit',$absence->id)}}" class="label label-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="bottom" title="Modifier"></i></a>
                        <span data-toggle="modal" data-link="{{route('absence.destroy',$absence->id)}}"   data-target="#modal-delete-element" data-div_refresh="div_absence_table" >
                          <a href="#" class="label label-danger"  data-div_refresh="div_absence_table" data-toggle="tooltip" data-placement="bottom" title="Supprimer"><i class="fa fa fa-trash"></i></a>
                        </span>
                      </td> 
{{--                       <td>
                        <div class="input-group input-group-sm">
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-warning">Action</button>
                            <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu menu">
                              <li><a href="{{route('conge.edit',$absence->id)}}">Afficher</a></li>
                              <li><a href="{{route('conge.edit',$conge->id)}}">Modifier</a></li>
                              <li class="divider"></li>
                              <li><a href="#" data-link="{{route('conge.destroy',$conge->id)}}"  class="text-red"  data-div_refresh="div_conge_table" data-toggle="modal" data-target="#modal-delete-element">Supprimer</a></li>
                            </ul>
                          </div>
                        </div>
                      </td>   --}}              
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="7"><p class="text-center">Aucune absence enrégistrée pour le moment</p></td>
                  </tr>
                @endif
              </table>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>