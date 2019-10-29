@extends('layouts.app')

@section('head')
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('')}}plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('')}}bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('')}}plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('')}}bower_components/select2/dist/css/select2.min.css">
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Créer un nouveau planning
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li><a href="#">Gere les agents</a></li>
        <li class="active">Ajouter</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
            <!-- SELECT2 EXAMPLE -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Fiche de Planning</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form action="{{route('planning.store')}}" method="post">
            @csrf
            <div class="row">
              <!-- form start -->
                <div class="panel-collapse">
                  <div class="box-body">
                    <div class="col-md-6">
                      <div class="form-group @error('agent')  has-error @enderror">
                        <label>Agent</label>
                        <select name="agent" class="form-control select2" style="width: 100%;">
                          <option selected="selected">Choisir l'agent</option>
                          <option value="" {{old('agent')=='1' ? 'selected' : null}}>Sana Michael Yves</option>
                          <option value="" {{old('agent')=='2' ? 'selected' : null}}>Kouda Soumaila</option>
                        </select>
                        @error('agent')
                            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                        @enderror
                      </div>
                      <div class="form-group @error('datenaissance')  has-error @enderror">
                        <label>Du</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="date" name="datenaissance" class="form-control pull-right" id="datepicker" value="{{old('datenaissance') ?: ''}}">
                        </div>
                        <!-- /.input group -->
                        @error('datenaissance')
                            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                        @enderror
                      </div>
                      <div class="form-group @error('datenaissance')  has-error @enderror">
                        <label>De</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="time" name="datenaissance" class="form-control pull-right" id="datepicker" value="{{old('datenaissance') ?: ''}}">
                        </div>
                        <!-- /.input group -->
                        @error('datenaissance')
                            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Site</label>
                        <select class="form-control select2" style="width: 100%;">
                          <option >Choisir un site</option>
                          @if(count($sites)>0)
                            @foreach($sites as $site)
                              <option value="{{$site->id}}">{{$site->nom}}</option>
                            @endforeach
                          @endif
                        </select>
                      </div>
                      <div class="form-group @error('datenaissance')  has-error @enderror">
                        <label>Au</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="date" name="datenaissance" class="form-control pull-right" id="datepicker" value="{{old('datenaissance') ?: ''}}">
                        </div>
                        <!-- /.input group -->
                        @error('datenaissance')
                            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                        @enderror
                      </div>
                      <div class="form-group @error('datenaissance')  has-error @enderror">
                        <label>À</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="time" name="datenaissance" class="form-control pull-right" id="datepicker" value="{{old('datenaissance') ?: ''}}">
                        </div>
                        <!-- /.input group -->
                        @error('datenaissance')
                            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                        @enderror
                      </div>
                    </div>
                  </div>

                <div class="col-md-12">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-lg btn-primary">Ajouter</button>
                  </div>
                </div>
                </div>
              <!-- /.col -->
            </div>
          </form>
          <!-- /.row -->
        </div>
      </div>
      <!-- /.box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Calendrier du planning</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <!-- form start -->
              
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('script')
<!-- jQuery 3 -->
<!-- Select2 -->
<script src="{{asset('')}}bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="{{asset('')}}plugins/input-mask/jquery.inputmask.js"></script>
<script src="{{asset('')}}plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="{{asset('')}}plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- bootstrap color picker -->
<script src="{{asset('')}}bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="{{asset('')}}plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="{{asset('')}}plugins/iCheck/icheck.min.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
@endsection