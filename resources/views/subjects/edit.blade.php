@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Editar Materia</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
                <li><a href="{{ url('materias') }}">listado de materias</a></li>
                <li class="active">Editar materia</li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container-flat-form">
        <div class="title-flat-form title-flat-blue">Editar Materia</div>
        <form method="POST" action="{{ url('materias/'.$subject->idsubject)}}">
            @csrf
            @method('put')
            <div class="row">
               <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="group-material">
                        <input type="text" class="material-control tooltips-general" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="name" value="{{ $subject->name }}">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Materia</label>
                    </div>
               </div>
               <button type="submit" class="btn btn-primary">Guardar</button>
           </div>
        </form>
    </div>
</div>
@endsection