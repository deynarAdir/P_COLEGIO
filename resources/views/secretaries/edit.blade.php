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
                    Bienvenido a la sección para editar los datos personales del usuario.
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Editar datos del usuario</div>
                <form method="POST" action="{{ route('secretary.update',$user->iduser)}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                       <div class="col-md-12 col-md-10 col-md-offset-1">
                            <legend>Datos personales</legend>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el nombre del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,25}" required="" maxlength="25" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del docente, solamente letras" name="name" value="{{ $user->name }}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el apellido paterno del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,15}" required="" maxlength="15" data-toggle="tooltip" data-placement="top" title="Escribe el apellido paterno del docente, solamente letras" name="paternal" value="{{ $user->paternal }}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Apellido Paterno</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aqui el apellido materno del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,15}" required="" maxlength="15" data-toggle="tooltip" data-placement="top" title="Escribe el apellido materno del docente, solamente letras" name="maternal" value="{{ $user->maternal }}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Apellido Materno</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="z ZZZ c CCC n NNN" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,50}" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe la direccion del docente,  z ZZZ c CCC n NNN" name="address" value="{{ $user->address }}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Direccion</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="email" class="material-control tooltips-general" placeholder="Escribe el correo electronico" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="ejemplo.@gmail.com" name="email" value="{{ $user->email }}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Correo electronico</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el número de teléfono del docente" pattern="[0-9]{1,12}" required="" maxlength="12" data-toggle="tooltip" data-placement="top" title="Maximo de numeros 12" name="phone" value="{{ $user->phone }}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Teléfono</label>
                                    </div>
                                </div>
                            </div>
                            <div class=row>

                                <div class="col-md-4 col-md-offset-4">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el número de celular del docente" pattern="[0-9 ]{1,15}" required maxlength="8" data-toggle="tooltip" data-placement="top" title="Solamente 8 números" name="cellphone" value="{{ $user->cellphone }}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Teléfono Celular</label>
                                    </div>
                                </div>
                            </div>
                            <legend>Datos academicos</legend><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el numero de certificado" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,30}" maxlength="30" data-toggle="tooltip" data-placement="top" required title="Numero de certificadoo" name="numberCer" value="{{ $secretary->num_job_certificate }}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Numero certificado</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el numero de diploma" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,30}" maxlength="30" data-toggle="tooltip" data-placement="top" required title="Numero de diploma" name="numberDip" value="{{ $secretary->num_languade_diploma }}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Numero diploma</label>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">
                                <a href="{{ route('secretary.index') }}"><button type="button" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Volver</button></a>
                                <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
