@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Grados</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
                <li><a href="{{ route('inscriptions.index') }}">Nueva Inscripción</a></li>
                <li class="active">Listado de Grados</li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid">
    <h2 class="text-center all-tittles">Lista de Estudiantes pre inscritos</h2>
    <div class="div-table">
        <div class="div-table-row div-table-head">
            <div class="div-table-cell">#</div>
            <div class="div-table-cell">nombre del Estudiante</div>
            <div class="div-table-cell">nombre del Tutor</div>
            <div class="div-table-cell">Curso</div>
            <div class="div-table-cell">Paralelo</div>
            <div class="div-table-cell">Estado</div>
            <div class="div-table-cell">Accion</div>
            <div class="div-table-cell">Accion</div>
        </div>
        @foreach($students as $s)
	        <div class="div-table-row">
                <div class="div-table-cell">{{ $s->idstudent}}</div>
                <div class="div-table-cell">{{ $s->user->nombre }}{{ $s->user->paternal }}{{ $s->user->maternal }}</div>

                @foreach ($managers as $m)
                    @if ($s->manager->idmanager = $m->idmanager)
                        <div class="div-table-cell">{{ $m->user->nombre }}{{ $m->user->paternal }}{{ $m->user->maternal }}</div>
                        @break
                    @endif

                @endforeach

                <div class="div-table-cell">{{ $s->degree->name }}</div>
                <div class="div-table-cell">{{ $s->parallel->name }}</div>
                <div class="div-table-cell">{{ $s->user->estate }}</div>
	            <div class="div-table-cell">
	                <button type="submit" class="btn btn-info tooltips-general" data-toggle="tooltip" data-placement="top"><i class="zmdi zmdi-swap"></i></button>
	            </div>
	            <div class="div-table-cell">
	                <a href="" class="btn btn-success"><i class="zmdi zmdi-refresh"></i></a>
	            </div>
	        </div>
	    @endforeach
    </div>
</div>
@endsection
