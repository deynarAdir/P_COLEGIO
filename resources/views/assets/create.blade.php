@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Nuevo equipo</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
                <li class="active">Agregar nuevo</li>
                <li class="active"><a href="{{ route('equipamiento.index') }}">Listado de equipos</a></li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <div class="title-flat-form title-flat-blue">Registrar nuevo equipo</div>
        <br>
        
      </div>
      <div class="x_content">
        <form action="{{ route('equipamiento.store') }}" method="POST" enctype="multipart/form-data">

          {{ csrf_field() }}
          <div class="row border">
            <div class="col-md-4 col-sm-12 col-12">
              <div class="group-material">
                  <input type="text" class="material-control tooltips-general" placeholder="Introduzca el nombre del equipo" title="Solamente letras y numeros, 10 dígitos" id="name" name="name">
                  <label>Nombre del Equipo</label>
              </div>
              <input type="text" hidden name="id_student" id="id_student">
            </div>
        
            <div class="col-md-4 col-sm-12 col-12">
              <div class="group-material">
                  <input type="text" class="material-control tooltips-general" placeholder="Introduzca la marca del Equipo" title="Solamente letras y números" id="brand" name="brand">
                  <label>Marca del equipo:</label>
              </div>
            </div>
          </div>
          <div class="row border">
            
            <div class="col-md-4 col-sm-12">
                <div class="group-material">
                  <input type="file" class="custom-file-input" placeholder="Introduzca una imagen" id="image" name="image">
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Imagen:</label>
               </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="group-material">
                  <input type="text" class="material-control tooltips-general" placeholder="Introduzca una descripcion del estado" title="Solamente letras y números" id="description" name="description">
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Descripcion:</label>
               </div>
            </div>
            
          </div>
                      <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-default" type="butto"><a href="{{ route('equipamiento.index') }}">Cancelar</a></button>
                          <button class="btn btn-warning" type="reset">Limpiar</button>
                          <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                      </div>
          
        </form>
      </div>
    </div>
  </div>
</div>


@endsection
