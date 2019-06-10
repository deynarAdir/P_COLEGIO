@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 class="all-tittles">Sistema educativo <small>Administración Contratos</small></h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
              <li class="active">Nuevo contrato</li>
              <li><a href="{{ route('secretary.index') }}">Lista de contratos</a></li>
          </ol>
      </div>
  </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Buscar usuario</div>
                <form class="pull-right" style="width: 90% !important;" autocomplete="off" method="GET" action="{{ route('contract.create')}}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="group-material">
                                <input type="search" style="display: inline-block !important; width: 70%;" class="material-control tooltips-general" placeholder="Buscar por Nombre" maxlength="20" data-toggle="tooltip" data-placement="top" title="Escribe el nombre" name="searchName">
                                <button class="btn" style="margin: 0; height: 43px; background-color: transparent !important;">
                                    <i class="zmdi zmdi-search" style="font-size: 25px;"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="group-material">
                                <input type="search" style="display: inline-block !important; width: 70%;" class="material-control tooltips-general" placeholder="Buscar por CI" maxlength="20" data-toggle="tooltip" data-placement="top" title="Ejemplo Docente, Secretaria" name="searchCI">
                                <button class="btn" style="margin: 0; height: 43px; background-color: transparent !important;">
                                    <i class="zmdi zmdi-search" style="font-size: 25px;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12 col-md-10 col-md-offset-1">
                        <legend>Resultados de la busqueda</legend>
                        <br>
                        <div class="table-responsive">
                            <div class="div-table" style="margin:0 !important;">
                                <div class="div-table-row div-table-row-list" style="background-color:#DFF0D8; font-weight:bold;">
                                    <div class="div-table-cell" style="width: 20%;">Nombre</div>
                                    <div class="div-table-cell" style="width: 20%;">Apellidos</div>
                                    <div class="div-table-cell" style="width: 20%;">CI</div>
                                    <div class="div-table-cell" style="width: 20%;">Rol</div>
                                    <div class="div-table-cell" style="width: 10%;">Crear</div>
                                </div>
                            </div>
                            @foreach($users as $us)
                            <div class="table-responsive">
                                <div class="div-table" style="margin:0 !important;">
                                    <div class="div-table-row div-table-row-list">
                                        <div class="div-table-cell" style="width: 20%;">{{ $us->name }}</div>
                                        <div class="div-table-cell" style="width: 20%;">{{ $us->paternal }} </div>
                                        <div class="div-table-cell" style="width: 20%;">{{ $us->ci}}</div>
                                        <div class="div-table-cell" style="width: 20%;">{{'ROL'}}</div>
                                        <div class="div-table-cell" style="width: 10%;">
                                            <form method="" action="#">
                                                @csrf
                                                <button class="btn btn-success"><i class="zmdi zmdi-plus-circle-o"></i></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6" id="createF">
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Registrar un nuevo contrato</div>
                <form method="POST" action="{{ route('secretary.store')}}" enctype="multipart/form-data" target="_blank">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-md-10 col-md-offset-1">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="group-material">
                                        <span>ID User</span>
                                        <select disabled class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige el genero del docente" name="gender">
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="group-material">
                                        <span>Tipo de contrato</span>
                                        <select class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige el genero del docente" name="gender">
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="group-material">
                                        <input type="date" class="material-control tooltips-general" placeholder="Escribe aquí el nombre del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,25}" required="" maxlength="25" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del docente, solamente letras" name="name">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Fecha Inicio</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="group-material">
                                        <input type="date" class="material-control tooltips-general" placeholder="Escribe aquí el apellido paterno del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,15}" required="" maxlength="15" data-toggle="tooltip" data-placement="top" title="Escribe el apellido paterno del docente, solamente letras" name="paternal">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Fecha termino</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el nombre del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,25}" required="" maxlength="25" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del docente, solamente letras" name="name">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Pago</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el apellido paterno del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,15}" required="" maxlength="15" data-toggle="tooltip" data-placement="top" title="Escribe el apellido paterno del docente, solamente letras" name="paternal">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Total Hrs</label>
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
    </div>
</div>


@endsection

@section('script')
    <script src="{{ asset('js/createContract.js') }}"></script>
@endsection
