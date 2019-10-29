                           
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
                  <th>Etablissement</th>
                  <th>Email</th>
                  <th>Ville</th>
                  <th>Contact</th>
                  <th>Action</th>
                </tr>
                @if(count($sites)>0)
                  @foreach($sites as $site)
                    <tr>
                      <td>{{$site->id}}</td>
                      <td>{{$site->nom.' '.$site->prenoms}}</td>
                      <td>{{$site->email}}</td>
                      <td>{{$site->ville}}</td>
                      <td>{{$site->telephone}}</td>                
                      <td>
                        <div class="input-group input-group-sm">
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-warning">Action</button>
                            <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu menu">
                              <li><a href="{{route('site.edit',$site->id)}}">Afficher</a>
                              </li>
                              <li><a href="{{route('site.edit',$site->id)}}">Modifier</a></li>
                              <li><a href="#">Planning</a></li>
                              <li class="divider"></li>
                              <li><a href="#" data-link="{{route('site.destroy',$site->id)}}"  class="text-red"  data-div_refresh="div_site_table" data-toggle="modal" data-target="#modal-delete-element">Supprimer</a></li>
                            </ul>
                          </div>
                        </div>
                      </td>                
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="6"><p class="text-center">Aucun site enrégistré pour le moment</p></td>
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