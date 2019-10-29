@extends('layouts.app')
@php

use Carbon\Carbon;

@endphp

@section('head')
  <!-- fullCalendar -->
  <link rel="stylesheet" href="{{asset('')}}/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="{{asset('')}}/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">


  <script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
@endsection

@section('content')



  <!-- Content Wrapper. Contains page content -->
  {{-- <div class="content-wrapper"> --}}
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-4" id="planning-form">
              {{-- Formulaire de creation --}}
              @include('pages.plannings.planning_form_create')
              {{-- / Formulaire de creation --}}
            </div>
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
  //Creation de planning
  function creerPlanning(){
    
    var form=$("#form-create-planning")

    $.ajax({
        url     : form.attr('action'),
        type    : form.attr('method'),
        data    : form.serialize(),
        dataType: 'json',
        success: function (data) {
          $('#div_calendar').html(data.calendar_view)
          //Supression des erreur
          $('div.form-group').removeClass('has-error');
          $('label.text-danger').remove();
        },
        error:function(xhr){
          // alert(Object.getOwnPropertyNames(xhr.responseJSON))
          // alert(xhr.responseJSON.date_debut)
         // $('#validation-errors').html('');
          //Netoyage des ancienes erreurs
          $('div.form-group').removeClass('has-error');
          $('label.text-danger').remove();
          $.each(xhr.responseJSON, function(key,value) {
              //Affichage des erreurs
              $('div.form-group.'+key).addClass('has-error');
              $('div.form-group.'+key).append('<label class="control-label text-danger" for="inputError"><i class="fa fa-times-circle-o"></i>'+value+'</label>');
          }); 
        }
    });
  }
  //Update Planning
  function updatePlanning(planning_id){
    
    var form=$("#form-create-planning")

    $.ajax({
        url     : form.attr('action'),
        type    : form.attr('method'),
        data    : form.serialize(),
        dataType: 'json',
        success: function (data) {
          $('#div_calendar').html(data.calendar_view)
        },
        error:function(xhr){
          // alert(Object.getOwnPropertyNames(xhr.responseJSON))
          // alert(xhr.responseJSON.date_debut)
         // $('#validation-errors').html('');
          $.each(xhr.responseJSON, function(key,value) {
              //Affichage des erreurs
              $('div.form-group.'+key).addClass('has-error');
              $('div.form-group.'+key).append('<label class="control-label text-danger" for="inputError"><i class="fa fa-times-circle-o"></i>'+value+'</label>');
          }); 
        }
    });
  }

  //Appeler formulaire de modification
  function showEditForm(planning_id){
    // e.preventDefault()
    $.ajax({
        url: "/planning/provisoires/modifier/"+planning_id,
        type    : 'GET',
        data    : {
          "id":  planning_id,
        },
        // dataType: 'json',
        success: function (data) {
          // alert(data.form_edit_view)
          $('#planning-form').html(data.form_edit_view)
          //Initialiser le TimePicker
          var MyTimePicker = new TimePicker(['heure_debut_m', 'heure_fin_m'], {
            lang: 'en',
            theme: 'dark'
          });
          MyTimePicker.on('change', function(evt) {
            
            var value = (evt.hour || '00') + ':' + (evt.minute || '00');
            evt.element.value = value;

          });
        },
        error:function(xhr){
          alert("Echec")
        }
    });
  }

  //Appeler formulaire de creation
  function showCreateForm(planning_id){
    // e.preventDefault()
    $.ajax({
        url: "/planning/provisoires/voir/"+planning_id,
        type    : 'GET',
        data    : {
          // "id":  planning_id,
        },
        // dataType: 'json',
        success: function (data) {
          // alert(data.form_edit_view)
          $('#planning-form').html(data.form_edit_view)
          //Initialiser le TimePicker
          var MyTimePicker = new TimePicker(['heure_debut', 'heure_fin'], {
            lang: 'en',
            theme: 'dark'
          });
          MyTimePicker.on('change', function(evt) {
            
            var value = (evt.hour || '00') + ':' + (evt.minute || '00');
            evt.element.value = value;

          });
        },
        error:function(xhr){
          alert("Echec")
        }
    });
  }
</script>
<script type="text/javascript">
  InitTimePicker()
</script>
@endsection