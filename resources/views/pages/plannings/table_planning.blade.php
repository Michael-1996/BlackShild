              
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
              <table class="table table-hover" style="padding-bottom: 200px">
                <tr>
                  <th>#</th>
                  <th>Nom & Prénoms</th>
                  <th>Contact</th>
                  <th>Statut</th>
                  <th>Total heure du mois</th>
                  <th>Action</th>
                </tr>
                @if(count($agents)>0)
                  @foreach($agents as $agent)
                    <tr>
                      <td>{{$agent['agent_id']}}</td>
                      <td>{{$agent['nom'].' '.$agent['prenoms']}}</td>
                      <td>{{$agent['numeromobile']}}</td>                
                      <td>
                        @if($agent['statut']==='deploye')
                          <span class="label label-primary">planifié</span>
                        @else
                          <span class="label label-warning">disponible</span>
                        @endif
                      </td>
                      <td><span class="label label-success">{{$agent['heure_total_jour'].' + '.$agent['heure_total_nuit']}} heures</span></td>
                      <td>
                        <div class="input-group input-group-sm">
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-warning">Action</button>
                            <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu menu">
                              <li><a href="{{route('planning.show',$agent['agent_id'])}}">Afficher</a>
                              </li>
                              <li><a href="{{route('planning.show',$agent['agent_id'])}}">Modifier</a></li>
                              <li><a href="{{route('planning.show',$agent['agent_id'])}}">Valider</a></li>
                              <li class="divider"></li>
                              <li><a href="#" class="text-red">Supprimer</a></li>
                            </ul>
                          </div>
                        </div>
                      </td>                
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="7"><p class="text-center">Aucun planning ajouté pour le moment</p></td>
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