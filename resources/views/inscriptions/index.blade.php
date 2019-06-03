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
        <form method="POST" action="{{ route('parallels.store') }}">
            @csrf
            <div class="row">
               <div class="col-xs-12 col-sm-8 col-sm-offset-2">



                    <div class="group-material">
                            <span>Grado</span>
                            <select  name="nivel" class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige la sección encargada del docente">
                                <option  value="" disabled="" selected="">Selecciona un Grado</option>
                                    @foreach ($degrees as $d)
                                        <option  value="{{$d->iddegree}}"  >{{$d->name}}sss</option>
                                    @endforeach

                            </select>
                        </div>

                        <div class="group-material">
                                <span>Paralelo</span>
                                <select name="nivel" class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige la sección encargada del docente">
                                    <option value="" disabled="" selected="">Selecciona un Paralelo</option>
                                        @foreach ($parallels as $p)
                                            <option value="{{$p->idparallel}}" >{{$p->name}}</option>
                                        @endforeach

                                </select>
                        </div>

                        <div class="group-material">
                                <span>Tutor</span>
                                <select name="nivel" class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige la sección encargada del docente">
                                    <option value="" disabled="" selected="">Secelcciona a un Apoderado</option>
                                        @foreach ($users as $u)
                                            <option value="{{$u->manager}}" >{{$u->name}}</option>
                                        @endforeach

                                </select>
                        </div>


                        <div class="group-material">
                            <input type="text" class="material-control tooltips-general " placeholder="ej: " required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="name" title="Ingresa un nuevo curso">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                             <label>Curso</label>
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
