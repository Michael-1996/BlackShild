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
  {{-- <div class="content-wrapper"> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Modifier un site
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li><a href="#">Sites de déploiements</a></li>
        <li class="active">Ajouter</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <br><br>
      <!-- /.row -->
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8 offset-md-2">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Modification des informations du site</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" action="{{route('site.update',$site->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="box-body">
                  <div class="form-group @error('nom')  has-error @enderror">
                    <label for="exampleInputEmail1">Etablissement</label>
                    <input name="nom" type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer le nom de l'nom" value="{{old('nom') ?: $site->nom}}">
                    @error('nom')
                        <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                    @enderror
                  </div>
                  <div class="form-group @error('adresse')  has-error @enderror">
                    <label for="exampleInputPassword1">Adresse</label>
                    <input name="adresse" type="text" class="form-control" id="exampleInputPassword1" placeholder="Entrer l'adresse" value="{{old('adresse') ?: $site->adresse}}">
                    @error('adresse')
                        <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                    @enderror
                  </div>
                  <div class="form-group @error('email')  has-error @enderror">
                    <label for="exampleInputPassword1">Email</label>
                    <input name="email" type="text" class="form-control" id="exampleInputPassword1" placeholder="Entrer l'email" value="{{old('email') ?: $site->email}}">
                    @error('email')
                        <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                    @enderror
                  </div>
                  <div class="form-group @error('ville')  has-error @enderror">
                    <label for="exampleInputPassword1">Ville</label>
                    <input name="ville" type="text" class="form-control" id="exampleInputPassword1" placeholder="Entrer le ville" value="{{old('ville') ?: $site->ville}}">
                    @error('ville')
                        <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                    @enderror
                  </div>
                  <div class="form-group @error('telephone')  has-error @enderror">
                    <label for="exampleInputPassword1">Téléphone</label>
                    <input name="telephone" type="text" class="form-control" id="exampleInputPassword1" placeholder="Entrer le telephone" value="{{old('telephone') ?: $site->telephone}}">
                    @error('telephone')
                        <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                    @enderror
                  </div>
                  <div class="form-group @error('site_web')  has-error @enderror">
                    <label for="exampleInputPassword1">Site Web</label>
                    <input name="site_web" type="text" class="form-control" id="exampleInputPassword1" placeholder="Entrer l'adresse du site" value="{{old('site_web') ?: $site->site_web}}">
                    @error('site_web')
                        <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                    @enderror
                  </div>
           {{--        <div class="form-group @error('photo')  has-error @enderror">
                    <label for="exampleInputFile">Photo du site</label>
                    <input name="photo" type="file" id="exampleInputFile" value="{{old('photo') ?: $site->photo}}">
                    @error('photo')
                        <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                    @enderror
                  </div> --}}
                  <div class="form-group @error('photo')  has-error @enderror">
                      <label>Photo du site</label>
                      <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file">
                                  Parcourir… <input name="photo" type="file" id="imgInp">
                              </span>
                          </span>
                          <input type="text" class="form-control">
                      </div>
                      @error('photo')
                          <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                      @enderror
                      <img width="200" id='img-upload' class="img img-responsive img-thumbnail"  src="{{asset('')}}{{old('photo') ?: $site->photo}}"/>
                  </div>
                  <hr>
                  <div class="form-group @error('nommanager')  has-error @enderror">
                    <label for="exampleInputPassword1">Nom du Manager du site</label>
                    <input name="nommanager" type="text" class="form-control" id="exampleInputPassword1" placeholder="Entrer le nommanager" value="{{old('nommanager') ?: $site->nommanager}}">
                    @error('nommanager')
                        <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                    @enderror
                  </div>
                  <div class="form-group @error('telephonemanager')  has-error @enderror">
                    <label for="exampleInputPassword1">Téléphone du manager</label>
                    <input name="telephonemanager" type="text" class="form-control" id="exampleInputPassword1" placeholder="Entrer le telephonemanager" value="{{old('telephonemanager') ?: $site->telephonemanager}}">
                    @error('telephonemanager')
                        <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                    @enderror
                  </div>
                  <div class="pull-right">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                  </div>
                </div>
                <!-- /.box-body -->

              </form>
            </div>
            <!-- /.box -->
          </div>
        </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  {{-- </div> --}}
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

<script type="text/javascript">
  $(document).ready( function() {
      $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
      
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
                $('#img-upload').css('height','200px');

            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });   
  });
</script>
@endsection