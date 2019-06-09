@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Editar Aula</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
                <li class="active">Edicion de Aula</li>
                <li><a href="{{ route('aulas.index') }}">listado de Aulas</a></li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container-flat-form">
        <div class="title-flat-form title-flat-blue">Editar Aula</div>
        <form method="POST" action="{{ route('aulas.update', $class->idclassroom) }}">
            @csrf
            @method('put')
            <div class="row">
               <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="group-material">
                        <input type="text" value="{{ $class->classroom_description }}" class="material-control tooltips-general" placeholder="Descripcion del Aula" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="classroom_description" title="Escribe la descripcion de la Mensualidad">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Descripcion</label>
                    </div>
                    <div class="group-material">
                        <input type="number" value="{{ $class->classroom_floor }}" class="material-control tooltips-general" placeholder="Introduzca el piso" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Piso de ubicacion del aula" name="classroom_floor">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Piso</label>
                    </div>
                    <div class="group-material">
                        <input type="number" value="{{ $class->capacity }}" class="material-control tooltips-general" placeholder="Introduzca la capacidad del aula" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="ZPiso de ubicacion del aula" name="capacity">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Capacidad</label>
                    </div>
                    <div class="group-material">
                        <input type="text" value="{{ $class->classroom_characteristic }}" class="material-control tooltips-general" placeholder="Caracteristicas del Aula" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="classroom_characteristic" title="Escribe las caracteristicas">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Caracteristicas</label>
                    </div>
                    <div class="group-material">
                        <span>Tipo de aula</span>
                        <select class="tooltips-general material-control" data-toggle="tooltip" data-placement="top" title="Elige el tipo de aula" name="id_type_classroom">
                            <option value="" disabled="" selected="">Selecciona un tipo de aula</option>
                            @foreach($types as $t)
                                @if($t->idtype_classroom == $class->id_type_classroom)
                                    <option selected="true" value={{ $t->idtype_classroom }}>{{ $t->description }}</option>
                                @else
                                    <option value={{ $t->idtype_classroom }}>{{ $t->description }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <p class="text-center">
                        <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                        <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                    </p> 
               </div>
           </div>
        </form>
    </div>
</div>
@endsection