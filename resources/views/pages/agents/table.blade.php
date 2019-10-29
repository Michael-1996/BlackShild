                                        
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
                  <th>Email</th>
                  <th>Département</th>
                  <th>Statut</th>
                  <th>Contact</th>
                  <th>Action</th>
                </tr>
                @if(count($agents)>0)
                  @foreach($agents as $agent)
                    <tr>
                      <td>{{$agent->id}}</td>
                      <td>{{$agent->nom.' '.$agent->prenoms}}</td>
                      <td>{{$agent->email}}</td>
                      <td>{{$agent->departement}}</td>
                      <td>
                        @if($agent->statut==='deploye')
                          <span class="label label-success">planifié</span>
                        @else
                          <span class="label label-warning">disponible</span>
                        @endif
                      </td>
                      <td>{{$agent->numeromobile}}</td>                
                      <td>
                        <div class="input-group input-group-sm">
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-warning">Action</button>
                            <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu menu">
                              <li><a href="#" onclick="editElement('{{route('agent.edit',$agent->id)}}')">Profil</a>
                              </li>
                              <li><a href="{{route('agent.edit',$agent->id)}}">Modifier</a></li>
                              <li><a href="{{route('planning.show',$agent->id)}}">Planning</a></li>
                              <li class="divider"></li>
                              <li><a href="#" data-link="{{route('agent.destroy',$agent->id)}}"  class="text-red"  data-div_refresh="div_agent_table" data-toggle="modal" data-target="#modal-delete-element">Supprimer</a></li>
                            </ul>
                          </div>
                        </div>
                      </td>                
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="7"><p class="text-center">Aucun agents enrégistrer pour le moment</p></td>
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