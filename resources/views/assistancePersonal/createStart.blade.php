@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
              <li class="active">Asistencia entrada</li>
              <li><a href="#">Asistencias salida</a></li>
          </ol>
      </div>
  </div>
</div>
<div class="row">
    <div class="col-sm-8 col-md-offset-2">
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Control de asistencia</div>
                <form method="POST" action="{{ route('assistancePersonal.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-md-10 col-md-offset-1">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="group-material">
                                        <label>Nombre</label><br><br>
                                        <input type="hidden" name="idUser" value="{{ $users->iduser}}">
                                        <input type="hidden" name="date" value="{{ $date}}">
                                        <input type="hidden" name="timeStart" value="{{ $time}}">
                                        <input type="text" class="material-control tooltips-general" disabled maxlength="50" data-toggle="tooltip" data-placement="top" name="name" value="{{ $users->name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="group-material">
                                        <label>Apellido paterno</label><br><br>
                                        <input type="text" class="material-control tooltips-general" disabled maxlength="50" data-toggle="tooltip" data-placement="top" name="paternal" value="{{ $users->paternal}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="group-material">
                                        <label>Hora de entrada</label><br><br>
                                        <input type="text" class="material-control tooltips-general" disabled maxlength="50" data-toggle="tooltip" data-placement="top" title="Hora de llegada del usuario"  value="{{ $time}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="group-material">
                                        <label>Fecha</label><br><br>
                                        <input type="text" class="material-control tooltips-general" disabled maxlength="50" data-toggle="tooltip" data-placement="top" title="Fecha del dia" value="{{ $date}}">
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">
                                <a class="btn btn-info" style="margin-right: 20px;" href="{{ route('assistancePersonal.index') }}"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp;Volver </a>
                                <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
