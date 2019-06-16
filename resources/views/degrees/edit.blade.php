@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Nuevo Curso</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
                <li class="active">Agregar nuevo</li>
                <li><a href="{{ route('degrees.index') }}">listado de cursos</a></li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container-flat-form">
        <div class="title-flat-form title-flat-blue">Editar Curso</div>
        <form method="POST" action="{{ route('degrees.update', $degree->iddegree) }}">
            @csrf
            @method('PUT')
            <div class="row">
               <div class="col-xs-12 col-sm-8 col-sm-offset-2">



                    <div class="group-material">
                        <input value="{{$degree->name}}" type="text" class="material-control tooltips-general" placeholder="ej: 1º Secundaria" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="name" title="Ingresa un nuevo curso">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Curso</label>
                    </div>

                    <div class="group-material">
                    <input value="{{$degree->quantity}}" type="text" class="material-control tooltips-general" placeholder="ej: 23" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="quantity" title="Ingresa una cantdad">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Cantidad</label>
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
