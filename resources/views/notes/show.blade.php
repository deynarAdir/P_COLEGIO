@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Estudiantes</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-justify lead">
            Esta es la lista de estudiantes del Profesor {{auth()->user()->name}} {{auth()->user()->paternal}} {{auth()->user()->maternal}} del curso 
        </div>
    </div>
    <h2 class="text-center all-tittles">Lista de Estudiantes</h2>
    <div class="div-table">
        <div class="div-table-row div-table-head">
            <div class="div-table-cell">Apellidos y Nombre</div>
            <div class="div-table-cell">CI</div>
            <div class="div-table-cell">RUDE</div>
            <div class="div-table-cell">Opcion</div>
        </div>  
        @foreach($assignments as $p)
            <div class="div-table-row">
                <div class="div-table-cell">{{ $p->paternal }} {{ $p->maternal }} {{ $p->name }}</div>
                <div class="div-table-cell">{{ $p->ci }}</div>
                <div class="div-table-cell">{{ $p->rude }}</div>
                <div class="div-table-cell">
                    <a href="" data-target="#modal-delete-{{ $p->assignment }}" data-toggle="modal"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i></a>
                </div>
            </div>
            @include('notes.modal')
        @endforeach
        
    </div>    
    <div class="container-fluid"  style="margin: 20px 0;">
        <div class="container-fluid">
            <a href="{{URL::action('NotesController@index')}}"><button class="btn btn-primary">Volver</i></button></a>               
        </div>
    </div>             
</div>
@endsection