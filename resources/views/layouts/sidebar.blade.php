 <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('')}}dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
{{--       <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{Request::is('/') ? 'active' : null}}">
          <a href="{{route('home')}}">
            <i class="fa fa-dashboard"></i> <span>Tableau de bord</span>
          </a>
        </li>
        <li class="{{Request::is('agents*') ? 'active' : null}} treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Gestion des Agents</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{(Request::is('agents/ajouter')) ? 'active' : null}}"><a href="#" onclick="getPage('{{route('agent.create')}}')"><i class="fa fa-circle-o {{(Request::is('agents/ajouter')) ? 'text-aqua' : null}}"></i>Ajouter un agent</a></li>
            <li class="{{(Request::is('agents')) ? 'active' : null}}"><a href="#" onclick="getPage('{{route('agent.index')}}')"><i class="fa fa-circle-o {{Request::is('agents') ? 'text-aqua' : null}}"></i> Liste des agents</a></li>
          </ul>
        </li>
        <li class="treeview {{Request::is('conges/*') ? 'active' : null}}">
          <a href="#">
            <i class="fa fa-warning"></i>
            <span>Gestion des Absences</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{(Request::is('conges')) ? 'active' : null}}"><a href="#" onclick="getPage('{{route('conge.index')}}')"><i class="fa fa-circle-o {{Request::is('conges') ? 'text-aqua' : null}}"></i>Agents en congés</a></li>
            <li class="{{(Request::is('conges/ajouter')) ? 'active' : null}}"><a href="#" onclick="getPage('{{route('conge.create')}}')"><i class="fa fa-circle-o {{(Request::is('conges/ajouter')) ? 'text-aqua' : null}}"></i>Agents Absents</a></li>
          </ul>
        </li>
        <li class="treeview {{(Request::is('sites') || Request::is('sites/ajouter')) ? 'active' : null}}">
          <a href="#">
            <i class="fa fa-sitemap"></i>
            <span>Sites de Déploiements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{(Request::is('sites/ajouter')) ? 'active' : null}}"><a href="#" onclick="getPage('{{route('site.create')}}')"><i class="fa fa-circle-o {{(Request::is('sites/ajouter')) ? 'text-aqua' : null}}"></i>Ajouter un site</a></li>
            <li class="{{(Request::is('sites')) ? 'active' : null}}"><a onclick="getPage('{{route('site.index')}}')" href="#"><i class="fa fa-circle-o {{Request::is('sites') ? 'text-aqua' : null}}"></i> Liste des sites</a></li>
          </ul>
        </li>
        <li class="treeview {{Request::is('planning/*') ? 'active' : null}}">
          <a href="#">
            <i class="fa fa-street-view"></i>
            <span>Planning Agent</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{(Request::is('planning/provisoires/creer')) ? 'active' : null}}"><a href="#" onclick="getPage('{{route('planning.create')}}')"><i class="fa fa-circle-o {{Request::is('planning/provisoires/creer') ? 'text-aqua' : null}}"></i>Plannifié un Agent</a></li>

            <li class="{{(Request::is('planning/provisoires')) ? 'active' : null}}"><a href="#" onclick="getPage('{{route('planning.index')}}')"><i class="fa fa-circle-o {{Request::is('planning/provisoires') ? 'text-aqua' : null}}"></i>Planning Provisoires</a></li>

            <li class="{{(Request::is('planning/definitives')) ? 'active' : null}}"><a href="#" onclick="getPage('{{route('planning.index_definitives')}}')"><i class="fa fa-circle-o {{(Request::is('planning/definitives')) ? 'text-aqua' : null}}"></i>Planning Définitives</a></li>

            <li class="{{(Request::is('planning/archives')) ? 'active' : null}}"><a href="#" onclick="getPage('{{route('planning.index_archive')}}')"><i class="fa fa-circle-o {{(Request::is('planning/archives')) ? 'text-aqua' : null}}"></i>Archives des Planning</a></li>

          </ul>
        </li>
        {{-- <li>
          <a href="pages/widgets.html">
            <i class="fa fa-calendar"></i> <span>Agenda</span>
          </a>
        </li> --}}
        {{-- <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> --}}
      </ul>
    </section>