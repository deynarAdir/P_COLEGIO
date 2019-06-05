@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Equipamiento</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
                <li><a href="{{ route('equipamiento.create') }}">Agregar nuevo</a></li>
                <li class="active">Listado de equipamentos</li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid">
    <h2 class="text-center all-tittles">Lista de equipos</h2>
    <div class="div-table">
        <div class="div-table-row div-table-head">
            <div class="div-table-cell">#</div>
            <div class="div-table-cell">Nombre</div>
            <div class="div-table-cell">Marca</div>
            <div class="div-table-cell">Imagen</div>
            <div class="div-table-cell">Descripcion</div>
        </div>  
        @foreach($assets as $a)
	        <div class="div-table-row">
	            <div class="div-table-cell">{{ $a->idasset}}</div>
	            <div class="div-table-cell">{{ $a->name }}</div>
	            <div class="div-table-cell">{{ $a->brand }}</div>
	            <div class="div-table-cell">{{ $a->image }}</div>
              <div class="div-table-cell">{{ $a->description }}</div>
              {{-- <div class="div-table-cell">
                  @if($m->state == 'Registrado')
                    <div class="text-center text-white">
                      <span class="badge bg-success">activo</span>
                    </div>
                  @else
                    <div class="text-center text-white">
                      <span class="badge bg-danger">inactivo</span>
                    </div>
                  @endif
                </div> --}}
	        </div>
	    @endforeach
    </div>                  
</div>
{{-- Modal Delete --}}

<div class="modal" id="modal-delete" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-body text-center">
                <h3 id="titulo-modal"></h3>
            </div>
            <form action="" method="post" id="form-delete">
                   @csrf
                   @method('put')
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" id="boton-desactivar"></button>
                </div>
             </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection