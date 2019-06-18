@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 class="all-tittles">Configuracion de ingreso y salida</h1>
    </div>
</div>
<div class="conteiner-fluid">
    <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
        <li role="presentation"><a href="{{ route('schedulesPersonal.index') }}">Listado de personal Administrativo</a></li>
        <li role="presentation"  class="active"><a href="#">Asignar horario</a></li>
    </ul>
</div>
<div class="container-fluid">
    <div class="container-flat-form">
        <div class="title-flat-form title-flat-blue">Asignar ingreso y salida</div>
        <form method="POST" action="{{ route('teacher.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" name="name" value="{{ $user->name }}">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Nombre</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" name="paternal" value="{{ $user->paternal }}">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Apellido Paterno</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" name="ci" value="{{ $user->ci }}">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>CI</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="group-material">
                                <input type="time" class="material-control tooltips-general" placeholder="z ZZZ c CCC n NNN" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe la la hora de ingreso" name="hourEntry">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Hora de ingreso</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="group-material">
                                <input type="time" class="material-control tooltips-general" placeholder="z ZZZ c CCC n NNN" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe la la hora de salida" name="hourExit">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Hora de salida</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            @foreach($days as $day)
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="materialInline1" name="day[]" value="{{ $day->idday}}">
                                <label class="form-check-label" for="materialInline1">{{ $day->description}}</label>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                <p class="text-center">
                    <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                    <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
