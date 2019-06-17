@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Editar Mensualidad</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
                <li><a href="{{ route('cuotas.index') }}">Listado de Mensualidades</a></li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container-flat-form">
        <div class="title-flat-form title-flat-blue">Registrar nueva Mensualidad</div>
        
        <form method="POST" action="{{ route('cuotas.update', $fee->idfee_type) }}">
            @csrf
            @method('put')
            <div class="row">
               <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    

                    <div class="group-material{{ $errors->has('discount') ? ' has-error ' : '' }}">
                        <input type="number" max="50" min="0" value="{{$fee->discount}}" class="material-control tooltips-general" placeholder="Fecha Inicial" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Fecha de inicio de Mensualidad" name="discount">
                        <span class="highlight"></span>
                        @if($errors->has('discount'))
                        <span class="bar"><strong style="color:red;">{{ $errors->first('discount') }}</strong></span>
                        @endif
                        <label>Decuento de cuota</label>
                    </div>

                    <div class="group-material{{ $errors->has('description') ? ' has-error ' : '' }}">
                        <input type="number" max="10" min="1" value="{{$fee->description}}" class="material-control tooltips-general" placeholder="Escriba el numero de cuota" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="description" title="Escribe la descripcion de la Mensualidad">
                        <span class="highlight"></span>
                        @if($errors->has('description'))
                        <span class="bar"><strong style="color:red;">{{ $errors->first('description') }}</strong></span>
                        @endif
                        <label>Descripcion</label>
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