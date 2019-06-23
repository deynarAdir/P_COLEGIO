@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Materias</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
                <li><a href="{{ url('subjects/create') }}">Agregar nuevo</a></li>
                <li class="active">listado de materias</li>
            </ol>
        </div>
    </div>
</div>


<div class="container-fluid">
    <h2 class="text-center all-tittles">Lista de materias</h2>

  <div class="div-table">
        <div class="div-table-row div-table-head">
            <div class="div-table-cell">Materia</div>
            <div class="div-table-cell">Fecha de creacion</div>
            <div class="div-table-cell">Fecha de modificacion</div>
            <div class="div-table-cell">Editar</div>
        </div>
        @foreach($subjects as $s)
          <div class="div-table-row">
              <div class="div-table-cell">{{ $s->name }}</div>
              <div class="div-table-cell">{{ $s->created_at }}</div>
              <div class="div-table-cell">{{ $s->updated_at }}</div>
              <div class="div-table-cell">
                <a href="{{ url('subjects/'.$s->idsubject.'/edit') }}" class="btn btn-success">Editar
                </a>
             </div>
          </div>
      @endforeach
    </div>
</div>
@endsection