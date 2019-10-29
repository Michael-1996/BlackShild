@extends('layouts.app')
@php
  use Carbon\Carbon;
@endphp
@section('head')

@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  {{-- <div class="content-wrapper"> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Liste des Plannings {{$title}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Accueil</a></li>
        <li><a href="#">Planning Agent</a></li>
        <li class="active">Liste des plannings</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Planning</h3>
            </div>
            <div class="box-body">
              <a href="{{route('planning.create')}}" class="btn btn-primary" role="button">Plannifier un agent</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tous les plannings</h3>
              <div class="box-tools">
                <form id="form-search" action="{{$action}}" method="post" style="display:flex;">
                  @csrf
                  <input type="hidden" name="statut" value="{{$statut}}">
                  <div class="box-tools" style="margin-right: 5px">
                    <div class="input-group input-group-sm hidden-xs" style="width: 120px;">
                      <select name="mois" class="form-control">
                        <option value="jan" {{Carbon::now()->format('m')==1 ? 'selected' : ''}}>Janvier</option>
                        <option value="feb" {{Carbon::now()->format('m')==2 ? 'selected' : ''}}>Février</option>
                        <option value="mar" {{Carbon::now()->format('m')==3 ? 'selected' : ''}}>Mars</option>
                        <option value="apr" {{Carbon::now()->format('m')==4 ? 'selected' : ''}}>Avril</option>
                        <option value="may" {{Carbon::now()->format('m')==5 ? 'selected' : ''}}>Mai</option>
                        <option value="jun" {{Carbon::now()->format('m')==6 ? 'selected' : ''}}>Juin</option>
                        <option value="jul" {{Carbon::now()->format('m')==7 ? 'selected' : ''}}>Juillet</option>
                        <option value="aug" {{Carbon::now()->format('m')==8 ? 'selected' : ''}}>Août</option>
                        <option value="sep" {{Carbon::now()->format('m')==9 ? 'selected' : ''}}>Septembre</option>
                        <option value="oct" {{Carbon::now()->format('m')==10 ? 'selected' : ''}}>Octobre</option>
                        <option value="nov" {{Carbon::now()->format('m')==11 ? 'selected' : ''}}>Novembre</option>
                        <option value="dec" {{Carbon::now()->format('m')==12 ? 'selected' : ''}}>Decembre</option>
                      </select>
                    </div>
                  </div>
                  <div class="box-tools" style="margin-right: 30px">
                    <div class="input-group input-group-sm hidden-xs" style="width: 100px;">
                      <select name="annee" class="form-control">
                        @for($i=1;$i<=3;$i++)
                          <option value="20{{Carbon::now()->addYear(3-$i)->format('y')}}">20{{Carbon::now()->addYear(3-$i)->format('y')}}</option>
                        @endfor
                        <option value="20{{Carbon::now()->format('y')}}" selected>20{{Carbon::now()->format('y')}}</option>
                        @for($i=1;$i<=9;$i++)
                          <option value="20{{Carbon::now()->format('y')-$i}}">20{{Carbon::now()->format('y')-$i}}</option>
                        @endfor
                      </select>

                      <div class="input-group-btn">
                        <button type="button" class="btn btn-default" onclick="search_plannig()"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>              
                  {{-- <div class="box-tools">
                    <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                      <input type="text" name="word" class="form-control pull-right" placeholder="Rechercher">

                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div> --}}
                </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div id="div_table_planning" class="box-body table-responsive no-padding">
              @include('pages.plannings.table_planning')
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
{{-- </div> --}}
<!-- ./wrapper -->
@endsection

@section('script')

<script type="text/javascript" src="{{asset('')}}assets/js/blackScript.js"></script>

@endsection