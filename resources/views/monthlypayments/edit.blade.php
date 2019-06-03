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
                <li><a href="{{ route('mensualidad.index') }}">Listado de Mensualidades</a></li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container-flat-form">
        <div class="title-flat-form title-flat-blue">Registrar nueva Mensualidad</div>
        
        <form method="POST" action="{{ route('mensualidad.update', $monthly->idmonthly_payment) }}">
            @csrf
            @method('put')
            <div class="row">
               <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    

                    <div class="group-material">
                        <input type="date" value="{{$monthly->start_date}}" class="material-control tooltips-general" placeholder="Fecha Inicial" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Fecha de inicio de Mensualidad" name="start_date">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Fecha inicial</label>
                    </div>

                    <div class="group-material">
                        <input type="date" value="{{$monthly->end_date}}" class="material-control tooltips-general" placeholder="Fecha Final" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Fecha final de Mensualidad" name="end_date">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Fecha Final</label>
                    </div>

                    <div class="group-material">
                        <input type="text" value="{{$monthly->description}}" class="material-control tooltips-general" placeholder="Descripcion de la Mensualidad" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="description" title="Escribe la descripcion de la Mensualidad">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Descripcion</label>
                    </div>

{{--                     <div class="group-material">
                        <input type="text" value="{{ $monthly->price }}" class="material-control tooltips-general" placeholder="Precio de la Mensualidad" required="" maxlength="20" data-toggle="tooltip" data-placement="top" name="price" title="Escriba el precio de la mensualidad">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Precio</label>
                    </div> --}}

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