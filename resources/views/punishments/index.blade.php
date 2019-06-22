@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Configuracionde retencion de acceso</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
                <li class="active">Lista de tiempos</li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid">
   {{ $c = 1 }}
    <h2 class="text-center all-tittles">Lista</h2>
    <div class="div-table">
        <div class="div-table-row div-table-head">
            <div class="div-table-cell">#</div>
            <div class="div-table-cell">Numero de Intento General</div>
            <div class="div-table-cell">Tiempo de retencion</div>
            <div class="div-table-cell">Actualizar</div>
        </div>  
        @foreach($p as $p)
	        <div class="div-table-row">
	            <div class="div-table-cell">{{ $c++}}</div>
              <div class="div-table-cell">{{ "Primer intento" }}</div>
	            <div class="div-table-cell">{{ $p->punishment1. " minutos" }}</div>
	            <div class="div-table-cell">
	               <a href="{{ url('configurar/tiempo/'.$p->idpunishment)."/1" }}" class="btn btn-success"><i class="zmdi zmdi-refresh"></i></a>
	            </div>
	        </div>
          <div class="div-table-row">
              <div class="div-table-cell">{{ $c++}}</div>
              <div class="div-table-cell">{{ "Segundo intento" }}</div>
              <div class="div-table-cell">{{ $p->punishment2. " minutos" }}</div>
              <div class="div-table-cell">
                 <a href="{{ url('configurar/tiempo/'.$p->idpunishment)."/2" }}" class="btn btn-success"><i class="zmdi zmdi-refresh"></i></a>
              </div>
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
<script>
    $('.delete-modal').click(function() {
        var estado = $(this).data('state');
        let action;
        if(estado){
          action = "{{ url('cuotas/desactivar') }}/" + $(this).data('id');
          $('#titulo-modal').text('¿Esta seguro de desactivar este registro?');
          $('#boton-desactivar').val('Desactivar');
          $('#boton-desactivar').attr('class','btn btn-danger');
          console.log('desactivar');
        }else{
          action = "{{ url('cuotas/activar') }}/" + $(this).data('id');
          $('#titulo-modal').text('¿Esta seguro de activar este registro?');
          console.log('activar');
          $('#boton-desactivar').val('Activar');
          $('#boton-desactivar').attr('class','btn btn-success');
        }
        $("#form-delete").attr("action", action);
        $('#modal-delete').modal('show');
    });
</script>
@endsection