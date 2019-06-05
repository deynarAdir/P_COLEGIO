@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Nueva Inscripcion</h1>
    </div>
</div>
<div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 lead">
                <ol class="breadcrumb">
                    <li><a href="{{ route('managers.create') }}">Agregar Tutor</a></li>
                </ol>
            </div>
        </div>
 </div>
<div class="container-fluid">
    <div class="container-flat-form">
        <div class="title-flat-form title-flat-blue">Registrar nueva Inscription</div>
        <form method="POST" action="{{ route('inscriptions.store') }}">
            @csrf
            <div class="row">
               <div class="col-xs-12 col-sm-8 col-sm-offset-2">

                    <div class="group-material ">
                            <span>Grado</span>
                            <select  name="id_degree" class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige la sección encargada del docente">
                                <option  value="" disabled="" selected="">Selecciona un Grado</option>
                                    @foreach ($degrees as $d)
                                        <option  value="{{$d->iddegree}}"  >{{$d->name}}sss</option>
                                    @endforeach

                            </select>
                        </div>

                        <div class=" group-material ">
                                <span>Paralelo</span>
                                <select name="id_parallel" class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige la sección encargada del docente">
                                    <option value="" disabled="" selected="">Selecciona un Paralelo</option>
                                        @foreach ($parallels as $p)
                                            <option value="{{$p->idparallel}}" >{{$p->name}}</option>
                                        @endforeach

                                </select>
                        </div>

                        <div class="group-material ">
                                <span>Tutor</span>
                                <select name="id_manager" class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige la sección encargada del docente">
                                        @foreach ($users as $u)
                                        <option  value="{{$u->manager}}" >{{$u->name}}-{{$u->paternal}}-{{$u->ci}}</option>
                                        @endforeach

                                </select>
                        </div>

                        <div class="group-material">
                            <input type="text" class="material-control tooltips-general" placeholder="ej: JOSE" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="name" title="Ingresa el nombre del estudiante">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>NOMBRE</label>
                        </div>

                        <div class="group-material">
                            <input type="text" class="material-control tooltips-general" placeholder="ej: MIRANDA" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="paternal" title="Ingresa el apellido paterno del estudiate ">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>PATERNO</label>
                        </div>

                        <div class="group-material">
                            <input type="text" class="material-control tooltips-general" placeholder="ej: MIRANDA" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="maternal" title="Ingresa el apellido materno del estudiate">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>MATERNO</label>
                        </div>

                        <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="ej: MASCULINO" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="gender" title="Ingresa el genero del estudiate">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>GENERO</label>
                        </div>

                        <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="ej: ORH+" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="blood_type" title="Ingresa el tipo de sangre del estudiate">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>TIPO DE SANGRE</label>
                        </div>

                        <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="ej: MASCULINO" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="age" title="Ingresa la edad del estudiate">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>EDAD</label>
                        </div>

                        <div class="group-material">
                            <input type="text" class="material-control tooltips-general" placeholder="ej: ZONA B CALLE 2 Nª2" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="address" title="Ingresa la direccion donde vive el estudiante">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>DIRECCION</label>
                        </div>
                        <div class="group-material">
                            <input type="text" class="material-control tooltips-general" placeholder="ej: ejemplo@gmail.com" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="email" title="Ingresa el email del estudiante">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>EMAIL</label>
                        </div>
                        <div class="group-material">
                            <input type="text" class="material-control tooltips-general" placeholder="ej: 8975464" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="ci" title="Ingresa la cedula de identidad del estudiante">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>CI</label>
                        </div>
                        <div class="group-material">
                            <input type="text" class="material-control tooltips-general" placeholder="ej: 7485461" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="cellphone" title="Ingresa el numero telefonico del estudiante">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>CELULAR</label>
                        </div>

                        <div class="group-material">
                            <input value="true" type="checkbox" class="material-control tooltips-general" placeholder="ej: 7485461" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="ci_photocopy" title="Ingresa el numero telefonico del estudiante">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>FOTOCOPIA DE CI</label>
                        </div>

                        <div class="group-material">
                            <input value="true" type="checkbox" class="material-control tooltips-general" placeholder="ej: 7485461" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="birth_certificate_original" title="Ingresa el numero telefonico del estudiante">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>CERTIFICADO DE NACIMIENTO ORIGINAL</label>
                        </div>

                        <div class="group-material">
                            <input value="true" type="checkbox" class="material-control tooltips-general" value="" required=""  data-toggle="tooltip" data-placement="top" name="rude" title="Ingresa el numero telefonico del estudiante">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>RUDE</label>
                        </div>

                        <div class="group-material">
                            <input value="true" type="checkbox" class="material-control tooltips-general" placeholder="ej: 7485461" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="photocopy_legalized_notebook" title="Ingresa el numero telefonico del estudiante">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>FOTOCOPIA LEGALIZADA DE LIBRETA DE NOTAS</label>
                        </div>

                        <div class="group-material">
                            <input value="true" type="checkbox" class="material-control tooltips-general" placeholder="ej: 7485461" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="original_notepad" title="Ingresa el numero telefonico del estudiante">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>LIBRETA ORIGINAL</label>
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
