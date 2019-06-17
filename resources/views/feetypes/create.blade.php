@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Nueva Pension</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
                <li class="active">Agregar nuevo</li>
                <li><a href="{{ route('cuotas.index') }}">listado de pensiones</a></li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container-flat-form">
        <div class="title-flat-form title-flat-blue">Registrar nueva Pension</div>
        <form method="POST" action="{{ route('cuotas.store') }}">
            @csrf

            <div class="row">
               <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    
                    <div class="group-material{{ $errors->has('discount') ? ' has-error ': '' }} ">
                        <input type="number" min="0" max="50" class="material-control tooltips-general" placeholder="Decuento" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Descuento" name="discount">
                        <span class="highlight"></span>

                        @if($errors->has('discount'))
                        <span class="ale"><strong style="color:red;">{{ $errors->first('discount') }}</strong></span>
                        @endif

                        <label>Descuento de cuota</label>
                    </div>
                    <div class="group-material{{ $errors->has('description') ? ' has-error ':'' }}">
                        <input type="number" min="1" max="10" class="material-control tooltips-general" placeholder="Numero de Cuotas" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="description" title="Escriba el numero de cuota(s)">
                        <span class="highlight"></span>

                        @if($errors->has('description'))
                        <span class="ale"><strong style="color:red;">{{ $errors->first('description') }}</strong></span>
                        @endif

                        <label>Cuotas</label>
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