

, @extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Aulas</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
                <li><a href="{{ route('aulas.create') }}">Agregar nuevo</a></li>
                <li class="active">Listado de Aulas</li>

            </ol>
        </div>
    </div>
</div>
<div class="container-fluid">
    <h2 class="text-center all-tittles">Lista de Aulas</h2>
    <div class="div-table">
        <div class="div-table-row div-table-head">
            <div class="div-table-cell">#</div>
            <div class="div-table-cell">Descripcion</div>
            <div class="div-table-cell">Piso</div>
            <div class="div-table-cell">Capacidad</div>
            <div class="div-table-cell">Caracteristica</div>
            <div class="div-table-cell">Tipo de Aula</div>
            <div class="div-table-cell">Estado</div>
            <div class="div-table-cell">Actualizar</div>
            <div class="div-table-cell">Accion</div>
        </div>  
        @foreach($class as $m)
	        <div class="div-table-row">
	            <div class="div-table-cell">{{ $m->idclassroom}}</div>
	            <div class="div-table-cell">{{ $m->classroom_description }}</div>
	            <div class="div-table-cell">{{ $m->classroom_floor }}</div>
	            <div class="div-table-cell">{{ $m->capacity }}</div>
              <div class="div-table-cell">{{ $m->classroom_characteristic }}</div>
              <div class="div-table-cell">{{ $m->description }}</div>
                <div class="div-table-cell">
                    @if($m->state == 1)
                      <div class="text-center text-white">
                        <span class="badge bg-success">activo</span>
                      </div>
                    @else
                      <div class="text-center text-white">
                        <span class="badge bg-danger">inactivo</span>
                      </div>
                    @endif
                  </div>
	            <div class="div-table-cell">
	               <a href="{{ route('aulas.edit',$m->idclassroom) }}" class="btn btn-success"><i class="zmdi zmdi-refresh"></i></a>
	            </div>
                <div class="div-table-cell">
                   <button class="btn {{ $m->state?'btn-danger':'btn-success' }} delete-modal"
                    data-id="{{ $m->idclassroom }}"
                    data-state="{{ $m->state }}">
                    <i class="zmdi zmdi-refresh"></i></button>
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
          action = "{{ url('aula/desactivar') }}/" + $(this).data('id');
          $('#titulo-modal').text('¿Esta seguro de desactivar este registro?');
          $('#boton-desactivar').val('Desactivar');
          $('#boton-desactivar').attr('class','btn btn-danger');
          console.log('desactivar');
        }else{
          action = "{{ url('aula/activar') }}/" + $(this).data('id');
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