@extends('layouts.app')
@section('content')
		<div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Sistema educativo <small>Administración Usuarios</small></h1>
            </div>
        </div>
        <div class="conteiner-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
                <li role="presentation"><a href="admin.html">Administradores</a></li>
                <li role="presentation"  class="active"><a href="teacher.html">Docentes</a></li>
                <li role="presentation"><a href="student.html">Estudiantes</a></li>
                <li role="presentation"><a href="personal.html">Personal administrativo</a></li>
            </ul>
        </div>
        <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="{!! asset('assets/img/user02.png') !!}" alt="user" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la sección para registrar nuevos docentes. Para registrar un docente debes de llenar todos los campos del siguiente formulario, también puedes ver el listado de docentes registrados
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li class="active">Nuevo docente</li>
                      <li><a href="{{ route('teacher.index') }}">Listado de docentes</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Registrar un nuevo docente</div>
                <form method="POST" action="{{ route('teacher.store')}}" enctype="multipart/form-data" target="_blank">
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
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aqui el apellido materno del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,15}" required="" maxlength="15" data-toggle="tooltip" data-placement="top" title="Escribe el apellido materno del docente, solamente letras" name="maternal">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Apellido Materno</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="z ZZZ c CCC n NNN" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,50}" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe la direccion del docente,  z ZZZ c CCC n NNN" name="address">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Direccion</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="email" class="material-control tooltips-general" placeholder="Escribe el correo electronico" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="ejemplo.@gmail.com" name="email">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Correo electronico</label>
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
                            <div class=row>
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el número de teléfono del docente" pattern="[0-9]{1,12}" required="" maxlength="12" data-toggle="tooltip" data-placement="top" title="Maximo de numeros 12" name="phone">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Teléfono</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el número de celular del docente" pattern="[0-9 ]{1,15}" required maxlength="8" data-toggle="tooltip" data-placement="top" title="Solamente 8 números" name="cellphone">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Teléfono Celular</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="password" class="material-control tooltips-general" placeholder="Escribe aquí la contraseña del docente" required="" maxlength="15" data-toggle="tooltip" data-placement="top" title="Numero maximo de caracteres es 15" name="password">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Contrasena</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4  col-sm-offset-4">
                                    <div class="group-material">
                                        <span>Genero</span>
                                        <select class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige el genero del docente" name="gender">
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                           <legend>Datos academicos</legend><br>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí la especialidad del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,40}" required="" maxlength="40" data-toggle="tooltip" data-placement="top" title="Asignatura del docente" name="speciality">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Especialidad</label>
                            </div>

                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el numero de item del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,30}" maxlength="30" data-toggle="tooltip" data-placement="top" title="Numero de item de trabajo" name="numberItem">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Numero item</label>
                            </div>

                            <div class="group-material">
                                <input type="file" class="material-control tooltips-general"  required="" title="Documento PDF" name="cv">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Documento PDF</label>
                            </div>

                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el colegio del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" required="" maxlength="40" data-toggle="tooltip" data-placement="top" title="Colegio de docente" name="teacherSchool">
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
