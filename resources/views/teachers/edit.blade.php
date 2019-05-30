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
                      <li class="active">Edicion del docente</li>
                      <li><a href="{{ route('teacher.index') }}">Listado de docentes</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue"> Modificar datos del docente</div>
                <form method="POST" action="{{ route('teacher.update',$user->iduser)}}">
                	@csrf
                    @method('PUT')
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                       		<legend>Datos personales</legend>
                       		<br>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el nombre del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,25}" required="" maxlength="25" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del docente, solamente letras" name="name" value="{{ $user->name }}">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Nombre</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el apellido paterno del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,15}" required="" maxlength="15" data-toggle="tooltip" data-placement="top" title="Escribe el apellido paterno del docente, solamente letras" name="paternal" value="{{ $user->paternal}}">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Apellido Paterno</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aqui el apellido materno del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,15}" maxlength="15" data-toggle="tooltip" data-placement="top" title="Escribe el apellido materno del docente, solamente letras" name="maternal" value="{{ $user->maternal }}">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Apellido Materno</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="z ZZZ c CCC n NNN" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,50}" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe la direccion del docente,  z ZZZ c CCC n NNN" name="address" value="{{ $user->address }}">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Direccion</label>
                            </div>
                            <div class="group-material">
                                <input type="email" class="material-control tooltips-general" placeholder="Escribe el correo electronico" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="ejemplo.@gmail.com" name="email" value="{{ $user->email }}">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Correo electronico</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el número de celular del docente" pattern="[0-9]{1,8}" maxlength="8" data-toggle="tooltip" data-placement="top" title="Solamente 8 números" name="cellphone" value="{{ $user->cellphone }}">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Teléfono Celular</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el número de teléfono del docente" pattern="[0-9]{1,12}" required="" maxlength="12" data-toggle="tooltip" data-placement="top" title="Maximo de numeros 12" name="phone"  value="{{ $user->phone }}">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Teléfono</label>
                            </div>
                           <legend>Datos academicos</legend><br>
                                                        <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí la especialidad del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,40}" required="" maxlength="40" data-toggle="tooltip" data-placement="top" title="Asignatura del docente" name="speciality" value="{{ $teacher->specialty }}">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Especialidad</label>
                            </div>s
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el colegio del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" required="" maxlength="40" data-toggle="tooltip" data-placement="top" title="Colegio de docente" name="teacherSchool" value="{{ $teacher->teachercol }}">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Docente colegio</label>
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
