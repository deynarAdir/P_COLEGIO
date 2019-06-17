@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
              <li><a href="{{ route('assistancePersonal.create')}}">Asistencias entrada</a></li>
              <li class="active">Asistencia salida</li>
          </ol>
      </div>
  </div>
</div>
<div class="row">
    <div class="col-sm-8 col-md-offset-2">
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Control de asistencia</div>
                <form method="POST" action="{{ route('assistancePersonal.update', $control->idadmin_control)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                       <div class="col-md-12 col-md-10 col-md-offset-1">
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="group-material">
                                        <input type="hidden" name="timeEnd" value="{{ $time }}">
                                        <label>Nombre</label><br><br>
                                        <input type="text" class="material-control tooltips-general" disabled required maxlength="50" data-toggle="tooltip" data-placement="top" title="Hora de llegada del usuario" name="name" value="{{ $users->name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="group-material">
                                        <label>Apellido paterno</label><br><br>
                                        <input type="text" class="material-control tooltips-general" disabled required maxlength="50" data-toggle="tooltip" data-placement="top" title="Hora de llegada del usuario" name="paternal" value="{{ $users->paternal}}">
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="group-material">
                                    <label>Hora de salida</label><br><br>
                                    <input type="text" class="material-control tooltips-general" disabled maxlength="50" data-toggle="tooltip" data-placement="top" title="Hora de llegada del usuario" name="timeEnd" value="{{ $time}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="group-material">
                                    <label>Fecha</label><br><br>
                                    <input type="text" class="material-control tooltips-general" disabled maxlength="50" data-toggle="tooltip" data-placement="top" title="Hora de llegada del usuario" value="{{ $date}}">
                                </div>
                            </div>
                        </div>
                        <div class=row>
                            <div class="col-md-6 col-md-offset-3">
                                <div class="group-material">
                                    <input type="time" class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Horas extras del empleado" name="timeExtra">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Horas Extras</label>
                                </div>
                            </div>
                        </div>
                        <p class="text-center">
                             <a class="btn btn-info" style="margin-right: 20px;" href="{{ route('assistancePersonal.indexOut', $control->idadmin_control) }}"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp;Volver </a>
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
