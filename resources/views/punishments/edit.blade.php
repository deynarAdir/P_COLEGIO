@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Editar Penalizacion</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
                <li><a href="{{ route('configuration.index') }}">Listado de Penalizaciones</a></li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container-flat-form">
        <div class="title-flat-form title-flat-blue">Editar Penalizacion</div>
        
        <form method="POST" action="{{ url('configurar/tiempo/'.$data['idpunishment']."/".$data['time']) }}">
            @csrf
            @method('put')
            <div class="row">
               <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="group-material{{ $errors->has('discount') ? ' has-error ' : '' }}">
                        <input type="number" max="50" min="0" value="{{$data['punishment']}}" class="material-control tooltips-general" placeholder="Fecha Inicial" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Fecha de inicio de Mensualidad" name="punishment">
                        <span class="highlight"></span>
                        @if($errors->has('discount'))
                        <span class="bar"><strong style="color:red;">{{ $errors->first('discount') }}</strong></span>
                        @endif
                        <label>Tiempo de penalizacion (minutos)</label>
                    </div>
                    <p class="text-center">
                        <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                        <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                    </p> 
                    
               </div>
           </div>
        </form>

    </div>
</div>
@endsection