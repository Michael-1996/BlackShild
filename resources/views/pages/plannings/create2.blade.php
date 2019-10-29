@extends('layouts.app')
@php

use Carbon\Carbon;

@endphp

@section('head')
    <!-- fullCalendar -->
  <link rel="stylesheet" href="{{asset('')}}/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="{{asset('')}}/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
    <!-- Select2 -->
  {{-- <link rel="stylesheet" href="{{asset('')}}bower_components/select2/dist/css/select2.min.css"> --}}

  <script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
  <link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  {{-- <div class="content-wrapper"> --}}

    <!-- Main content -->
    <section class="content">
      <form id="form-create-planning" action="{{route('planning.store')}}" method="post">
        @csrf
        <div class="row">
          <div class="col-md-4">
            <!-- /. box -->
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Créer un Planning</h3>
              </div>
              <div class="box-body">
                <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                  <div class="form-group @error('site')  has-error @enderror">
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

                  <div class="form-group @error('agent')  has-error @enderror">
                    <label>Agent</label>
                    <select name="agent" class="form-control select2" style="width: 100%;">
                      <option value="">Choisir l'agent</option>
                        @if(count($agents)>0)
                          @foreach($agents as $agent)
                            <option value="{{$agent->id}}"  {{old('agent')==$agent->id ? 'selected' : null}}>{{$agent->nom.' '.$agent->prenoms}}</option>
                          @endforeach
                        @endif
                    </select>
                    @error('agent')
                        <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                    @enderror
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6 @error('date_debut')  has-error @enderror" style="padding-left: 0px">
                      <label for="inputEmail4">Du</label>
                      <input name="date_debut" type="date" class="form-control" id="inputEmail4" placeholder="Email" value="{{old('date_debut') ?: ''}}">
                      @error('date_debut')
                          <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                      @enderror
                    </div>
                    <div class="form-group col-md-6 @error('date_fin')  has-error @enderror" style="padding-right: 0px">
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
                      <input id="heure_debut" name="heure_debut" type="text" class="form-control" placeholder="Heure Début" value="{{old('heure_debut') ?: ''}}">
                      @error('heure_debut')
                          <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                      @enderror
                    </div>
                    <div class="form-group heure_fin col-md-6 @error('heure_fin')  has-error @enderror" style="padding-right: 0px">
                      <label for="inputPassword4">A</label>
                      <input id="heure_fin" name="heure_fin" type="text" class="form-control" placeholder="Heure Fin" value="{{old('heure_fin') ?: ''}}">
                      @error('heure_fin')
                          <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                      @enderror
                    </div>
                  </div> 
                </div>
                <!-- /btn-group -->
                <div class="input-group pull-right">
                    <button type="submit" class="btn btn-primary btn-flat btn-add-planning-submit">Ajouter</button>
                  <!-- /btn-group -->
                </div>
                <!-- /input-group -->
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <div id="div_calendar">
              <div class="box box-primary">
                <div class="box-body no-padding">
                  <!-- THE CALENDAR -->
                  <div id="calendar"></div>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <!-- /. box -->
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.row -->
    </section>
    <!-- /.content -->

    <!-- Delete modal -->

    <div class="modal modal-danger fade" id="modal-danger">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Suppression de Planning</h4>
          </div>
          <div class="modal-body">
            <p>Etes vous sûr de vouloir supprimer ce planning ? </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Annuler</button>
            <button type="button" class="btn btn-outline btn-ok">Supprimer</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  {{-- </div> --}}
  <!-- /.content-wrapper -->
@endsection

@section('script')
<!-- fullCalendar -->
<script src="{{asset('')}}/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<!-- Page specific script -->
<!-- Add calendarJsFile -->
@include('pages.plannings.calendarJs')
<!-- / Add calendarJsFile -->
<script type="text/javascript">
  InitTimePicker()
</script>
@endsection

