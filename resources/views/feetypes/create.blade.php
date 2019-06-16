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
                    
                    <div class="group-material">
                        <input type="number" class="material-control tooltips-general" placeholder="Decuento" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Fecha de inicio de Mensualidad" name="discount">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Descuento de cuota</label>
                    </div>

                    <div class="group-material">
                        <input type="number" class="material-control tooltips-general" placeholder="Descripcion de la Mensualidad" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="description" title="Escriba el numero de cuota(s)">
                        <span class="highlight"></span>
                        <span class="bar"></span>
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