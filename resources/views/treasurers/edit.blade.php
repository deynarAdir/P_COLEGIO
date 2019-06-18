@extends('layouts.app')
@section('content')
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Docentes</h1>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Actualizar datos del docente</div>
                <form method="POST" action="{{ route('teacher.update',$user->iduser)}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                       <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                            <center><legend>Datos personales</legend></center>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el nombre del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,25}" required="" maxlength="25" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del docente" name="name" value="{{ $user->name }}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el apellido paterno del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,15}" required="" maxlength="15" data-toggle="tooltip" data-placement="top" title="Escribe el apellido paterno del docente" name="paternal" value="{{ $user->paternal }}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Apellido Paterno</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el apellido materno del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,15}" maxlength="15" data-toggle="tooltip" data-placement="top" title="Escribe el apellido materno del docente, solamente letras" name="maternal" value="{{ $user->maternal }}">
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
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el numero de carnet de identidad" pattern="[0-9 ]{1,15}" required="" maxlength="15" data-toggle="tooltip" data-placement="top" title="Escribe el CI del docente, solamente numeros" name="ci" value="{{ $user->ci }}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>CI</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el número de celular del docente" required pattern="[0-9]{1,8}" maxlength="8" data-toggle="tooltip" data-placement="top" title="Solamente 8 números" name="cellphone" value="{{ $user->cellphone }}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Teléfono Celular</label>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el número de teléfono del docente" pattern="[0-9]{1,12}" maxlength="12" data-toggle="tooltip" data-placement="top" title="Maximo de numeros 12" name="phone" value="{{ $user->phone }}">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Teléfono</label>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">
                                <a class="btn btn-info" style="margin-right: 20px;" href="{{ route('teacher.index')}}"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Volver</a>
                                <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
