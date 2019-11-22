@extends('layouts.app')

@section('head')

@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  {{-- <div class="content-wrapper"> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registre Unique du Personnel
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Accueil</a></li>
        <li><a href="#">Gestion des agents</a></li>
        <li class="active">Registre Unique du Personnel</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tous les agents</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
              <div class="box-tools" style="margin-right: 30px">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <select class="form-control">
                    <option>Tout Afficher</option>
                    <option>Déployé</option>
                    <option>Non Déployé</option>
                  </select>

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
              <div class="box-tools" style="margin-right: 30px">
                <div class="input-group input-group-sm hidden-xs" style="width: 30px;">
                  <a class="btn btn-sm btn-social btn-vk">
                    <i class="fa fa-pdf"></i> Export
                  </a>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding" id="div_agent_table">


              @include('pages.agents.table')


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  {{-- </div> --}}
@endsection
