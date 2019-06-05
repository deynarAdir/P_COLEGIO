@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Tipo de Cuota</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
                <li><a href="{{ route('feetype.create') }}">Agregar nuevo</a></li>
                <li class="active">Listado de Tipo de cuota</li>


            </ol>
        </div>
    </div>
</div>
<div class="container-fluid">
    <h2 class="text-center all-tittles">Lista de Tipo de Cuota</h2>
    <div class="div-table">
        <div class="div-table-row div-table-head">
            <div class="div-table-cell">#</div>
            <div class="div-table-cell">Descripcion</div>
            <div class="div-table-cell">Costo</div>
            <div class="div-table-cell">Descuento</div>
            <div class="div-table-cell">Actualizar</div>
        </div>  
        @foreach($fee as $f)
	        <div class="div-table-row">
	            <div class="div-table-cell">{{ $f->idfee_types }}</div>
	            <div class="div-table-cell">{{ $f->description }}</div>
	            <div class="div-table-cell">{{ $f->price }}</div>
	            <div class="div-table-cell">{{ $f->discount }}</div>
	            <div class="div-table-cell">
	               <a href="{{ route('feetype.edit',$f->idfee_types) }}" class="btn btn-success"><i class="zmdi zmdi-refresh"></i></a>
	            </div>
              
	        </div>
	    @endforeach
    </div>                  
</div>
{{-- Modal Delete --}}


@endsection
