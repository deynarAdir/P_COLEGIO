@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Opciones de Docente</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
                <li class="active">Ingreso de Notas</li>
            </ol>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-justify lead">
            Bienvenido Profesor(a) {{auth()->user()->name}} {{auth()->user()->paternal}} {{auth()->user()->maternal}} debe elegir la materia que desea ingresar las notas
        </div>
    </div>    

    <h2 class="text-center all-tittles">Lista de Materias</h2>
    <div class="div-table">
        <div class="div-table-row div-table-head">
            <div class="div-table-cell">Materia</div>
            <div class="div-table-cell">Grado</div>
            <div class="div-table-cell">Opcion</div>
        </div>  
        @foreach($subjects as $subj)
            <div class="div-table-row">
                <div class="div-table-cell">{{ $subj->subject }}</div>
                <div class="div-table-cell">{{ $subj->degree }}</div>
                <div class="div-table-cell">
                    <a href="{{URL::action('NotesController@show',$subj->idsubject_teacher_detail)}}"><button class="btn btn-info">Editar</button></a>
                </div>
            </div>
        @endforeach
        
    </div> 
    
</div>
@endsection