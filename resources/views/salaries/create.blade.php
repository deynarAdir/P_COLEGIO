@extends('layouts.app')
@section('content')
		<div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Sistema educativo <small>Administración Usuarios</small></h1>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li class="active">Nuevo pago</li>
                      <li><a href="#">Listado de pagos</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Registrar un nuevo pago</div>
                <form method="POST" action="{{ route('secretary.store')}}" enctype="multipart/form-data" target="_blank">
                	@csrf
                    <div class="row">
                       <div class="col-md-12 col-md-10 col-md-offset-1">
                       		<legend>Datos personales</legend>
                       		<br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el nombre del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,25}" required="" maxlength="25" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del docente, solamente letras" name="name">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el apellido paterno del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,15}" required="" maxlength="15" data-toggle="tooltip" data-placement="top" title="Escribe el apellido paterno del docente, solamente letras" name="paternal">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Apellido Paterno</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el numero de carnet de identidad" pattern="[0-9 ]{1,15}" required="" maxlength="15" data-toggle="tooltip" data-placement="top" title="Escribe el CI del docente, solamente numeros" name="ci">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>CI</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="z ZZZ c CCC n NNN" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,50}" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe la direccion del docente,  z ZZZ c CCC n NNN" name="address">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Inicio de mes</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="email" class="material-control tooltips-general" placeholder="Escribe el correo electronico" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="ejemplo.@gmail.com" name="email">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Fin mes</label>
                                    </div>
                                </div>
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
