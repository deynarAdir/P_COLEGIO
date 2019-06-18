@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Paralelos</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
                <li><a href="{{ route('parallels.create') }}">Agregar nuevo</a></li>
                <li class="active">Listado de Paralelos</li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid">
    <h2 class="text-center all-tittles">Lista de Paralelos</h2>
    <div class="div-table">
        <div class="div-table-row div-table-head">
            <div class="div-table-cell">#</div>
            <div class="div-table-cell">nombre del Paralelos</div>
            <div class="div-table-cell">cantidad</div>
            <div class="div-table-cell">Estado</div>
            <div class="div-table-cell">Actualizar</div>
        </div>
        @foreach($parallels as $p)
	        <div class="div-table-row">
	            <div class="div-table-cell">{{ $p->idparallel}}</div>
	            <div class="div-table-cell">{{ $p->name }}</div>
	            <div class="div-table-cell">{{ $p->quantity }}</div>
	            <div class="div-table-cell">
	                       <button type="submit" class="btn btn-info tooltips-general" data-toggle="tooltip" data-placement="top"><i class="zmdi zmdi-swap"></i></button>
	            </div>
	            <div class="div-table-cell">
	                       <a href="{{ route('parallels.edit',$p->idparallel) }}" class="btn btn-success"><i class="zmdi zmdi-refresh"></i></a>
	            </div>
	        </div>
	    @endforeach
    </div>
</div>
@endsection
