@extends('layouts.app')
@section('content')
		<div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Secretari@s</h1>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li class="active">Agregar Nuevo </li>
                      <li><a href="{{ route('secretary.index') }}">Listado</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Registrar un nuevo secretari@</div>
                <form method="POST" action="{{ route('secretary.store')}}" enctype="multipart/form-data">
                	@csrf
                    <div class="row">
                       <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                       		<center><legend>Datos personales</legend></center>
                       		<br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el nombre del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,25}" required="" maxlength="25" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del docente" name="name">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el apellido paterno del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,15}" required="" maxlength="15" data-toggle="tooltip" data-placement="top" title="Escribe el apellido paterno del docente" name="paternal">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Apellido Paterno</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el apellido materno del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,15}" maxlength="15" data-toggle="tooltip" data-placement="top" title="Escribe el apellido materno del docente, solamente letras" name="maternal">
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
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el número de celular del docente" required pattern="[0-9]{1,8}" maxlength="8" data-toggle="tooltip" data-placement="top" title="Solamente 8 números" name="cellphone">
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
                                <div class="col-md-4">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el número de teléfono del docente" pattern="[0-9]{1,12}" maxlength="12" data-toggle="tooltip" data-placement="top" title="Maximo de numeros 12" name="phone">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Teléfono</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="group-material">
                                        <span>Genero</span>
                                        <select class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige el genero del docente" name="gender">
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                               <center><legend>Datos academicos</legend></center>
                               <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="group-material">
                                            <input type="text" class="material-control tooltips-general" placeholder="Escriba el numero de certificado de la secretaria" pattern="[a-zA-Z0-9 ]{1,40}" required="" maxlength="40" data-toggle="tooltip" data-placement="top" title="Numero de certificado" name="numberCer">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Numero de certificado de trabajo</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="group-material">
                                            <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el nombre de titulo de la secretaria" pattern="[a-zA-Z]{1,30}" required="" maxlength="30" data-toggle="tooltip" data-placement="top" title="Titulo universitario" name="title">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Titulo academico</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="group-material">
                                            <input type="file" class="material-control tooltips-general"  required="" title="Sibir documento PDF" name="cv">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Curruculum Vitae PDF</label>
                                        </div>
                                    </div>
                                </div>
                                <center><legend>Contrato</legend></center>
                               <br>
                               <div class="row">
                                   <div class="col-md-6 col-md-offset-3">
                                        <div class="group-material">
                                            <span>Tipo de contrato</span>
                                            <select class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige el tipo de contrato" name="typeContract">
                                                @foreach($typeContract as $type)
                                                <option value="{{ $type->idtype_contract}}">{{ $type->description}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                               </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="group-material">
                                            <input type="date" class="material-control tooltips-general" required="" maxlength="40" data-toggle="tooltip" data-placement="top" title="Fecha de inicio de contrato" name="dateStart">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Fecha de inicio</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="group-material">
                                            <input type="date" class="material-control tooltips-general" required="" maxlength="40" data-toggle="tooltip" data-placement="top" title="Fecha termino de contrato" name="dateEnd">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Fecha de culminacion</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="group-material">
                                            <input type="text" class="material-control tooltips-general" required="" maxlength="40" data-toggle="tooltip" data-placement="top" title="Total de pago" name="payment" placeholder="Ej.: 878.0">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Pago</label>
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
