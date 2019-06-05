@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Nuevo Tipo de Cuota</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
                <li class="active">Agregar nuevo</li>
                <li><a href="{{ route('feetype.index') }}">Listado de Tipo Cuotas</a></li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container-flat-form">
        <div class="title-flat-form title-flat-blue">Registrar nuevo tipo de cuota</div>
        <form method="POST" action="{{ route('feetype.store') }}">
            @csrf
            <div class="row">
               <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    
                    <div class="group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="Descripcion del Tipo de Cuota" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Escriba la Descripcion del tipo de cuota" name="description">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Descripcion</label>
                    </div>

                    <div class="group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="Precio de la cuota" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Escriba el precio a cancelar" name="price">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Precio</label>
                    </div>

                    <div class="group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="Descuento del tipo de cuota" required="" maxlength="20" data-toggle="tooltip" data-placement="top" name="discount" title="Escriba el descuento de la cuota">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Descuento</label>
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