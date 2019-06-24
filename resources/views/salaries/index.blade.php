@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Pagos Personal</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
                <li><a href="{{ route('salary.create') }}">Agregar nuevo pago</a></li>
                <li class="active">Listado de pagos</li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid">
    <h2 class="text-center all-tittles">Lista de pagos realizados</h2>
    <div class="div-table">
        <div class="div-table-row div-table-head">
            <div class="div-table-cell">#</div>
            <div class="div-table-cell">Numero de Serie</div>
            <div class="div-table-cell">Numero de factura</div>
            <div class="div-table-cell">Total Pago</div>
            <div class="div-table-cell">Fecha</div>
            <div class="div-table-cell">Estudiante</div>
            <div class="div-table-cell">Nit_ci responsable</div>
            <div class="div-table-cell">Ver</div>
            <div class="div-table-cell">Estado</div>
        </div>

	        <div class="div-table-row">
	            <div class="div-table-cell">}</div>
	            <div class="div-table-cell">}</div>
	            <div class="div-table-cell">}}</div>
	            <div class="div-table-cell">{</div>
              <div class="div-table-cell"></div>
              <div class="div-table-cell"></div>
              <div class="div-table-cell">}}</div>
              <div class="div-table-cell">
                <a href="#" class="btn btn-success btn-xs modal-ml">
                    ver
                </a>
                <a href="#" class="btn btn-danger btn-xs modal-ml">
                    pdf
                </a>
              </div>
              <div class="div-table-cell">
                <span class="badge bg-blue">estad</span>
              </div>
	        </div>

    </div>
    <div class="text-center">

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
          action = "{{ url('mensualidad/desactivar') }}/" + $(this).data('id');
          $('#titulo-modal').text('¿Esta seguro de desactivar este registro?');
          $('#boton-desactivar').val('Desactivar');
          $('#boton-desactivar').attr('class','btn btn-danger');
          console.log('desactivar');
        }else{
          action = "{{ url('mensualidad/activar') }}/" + $(this).data('id');
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