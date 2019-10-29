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
        Ajouter un nouveau congé/absence
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
                <h3 class="box-title">Nouveau Congé/Absence</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" action="{{route('conge.store')}}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                  <div class="form-group @error('agent')  has-error @enderror">
                    <label>Nom de l'Agent</label>
                    <select name="agent" class="form-control">
                      <option value="">Choisir agent</option>
                      @if(count($agents)>0)
                        @foreach($agents as $agent)
                          <option value="{{$agent->id}}" {{old('agent')==$agent->id ? 'selected' : null}}>{{$agent->nom.' '.$agent->prenoms}}</option>
                        @endforeach
                      @endif
                    </select>
                    @error('agent')
                        <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                    @enderror
                  </div>
                  <div class="form-group @error('typeconge')  has-error @enderror">
                    <label>Type de congé</label>
                    <select name="typeconge" class="form-control">
                      <option value="">Choisir le type</option>
                    </select>
                    @error('typeconge')
                        <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                    @enderror
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6 @error('date_debut')  has-error @enderror" style="padding-left: 0px">
                      <label for="inputEmail4">Du</label>
                      <input name="date_debut" type="date" class="form-control" value="{{old('date_debut') ?: ''}}">
                      @error('date_debut')
                          <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                      @enderror
                    </div>
                    <div class="form-group col-md-6 @error('date_fin')  has-error @enderror" style="padding-right: 0px">
                      <label for="inputPassword4">Au</label>
                      <input name="date_fin" type="date" class="form-control" value="{{old('date_fin') ?: ''}}">
                      @error('date_fin')
                          <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                      @enderror
                    </div>
                  </div>                   
                  <div class="form-group @error('motif')  has-error @enderror">
                    <label>Motif de congé</label>
                    <textarea name="motif" rows="7" class="form-control">{{old('motif')}}</textarea>
                    @error('motif')
                        <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$message}}</label>
                    @enderror
                  </div>
                  <div class="pull-right">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
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

@endsection