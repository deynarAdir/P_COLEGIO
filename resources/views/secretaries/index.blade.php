@extends('layouts.app')
@section('content')
	 	<div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Sistema bibliotecario <small>Administración Usuarios</small></h1>
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
                    Bienvenido a la sección donde se encuentra el listado del personal administrativo registrados en el sistema, puedes actualizar algunos datos del personal o eliminar el registro completo del personal.<br>
                    <strong class="text-danger"><i class="zmdi zmdi-alert-triangle"></i> &nbsp; ¡Importante! </strong>Si eliminas un registro del sistema se borrarán todos los datos relacionados con él.
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('secretary.create') }}">Nuevo Personal</a></li>
                        <li class="active">Listado del personal</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <form class="pull-right" style="width: 30% !important;" autocomplete="off" method="GET" action="{{ route('secretary.index') }}">
                <div class="group-material">
                    <input type="search" style="display: inline-block !important; width: 70%;" class="material-control tooltips-general" placeholder="Buscar por nombre o CI" maxlength="20" data-toggle="tooltip" data-placement="top" title="Escribe los nombres, o carnet de identidad" name="searchName">
                    <button class="btn" style="margin: 0; height: 43px; background-color: transparent !important;">
                        <i class="zmdi zmdi-search" style="font-size: 25px;"></i>
                    </button>
                </div>
            </form>
            <h2 class="text-center all-tittles" style="clear: both; margin: 25px 0;">Listado de docentes</h2>
            <div class="table-responsive">
                <div class="div-table" style="margin:0 !important;">
                    <div class="div-table-row div-table-row-list" style="background-color:#DFF0D8; font-weight:bold;">
                        <div class="div-table-cell" style="width: 6%;">ID</div>
                        <div class="div-table-cell" style="width: 15%;">Nombre</div>
                        <div class="div-table-cell" style="width: 15%;">Apellidos</div>
                        <div class="div-table-cell" style="width: 15%;">CI</div>
                        <div class="div-table-cell" style="width: 12%;">Celular</div>
                        <div class="div-table-cell" style="width: 9%;">Actualizar</div>
                        <div class="div-table-cell" style="width: 9%;">Eliminar</div>
                    </div>
                </div>
                @foreach($users as $us)
		            <div class="table-responsive">
		                <div class="div-table" style="margin:0 !important;">
		                    <div class="div-table-row div-table-row-list">
		                        <div class="div-table-cell" style="width: 6%;">{{'codTeacher'}}</div>
	                            <div class="div-table-cell" style="width: 15%;">{{$us->name}}</div>
	                            <div class="div-table-cell" style="width: 15%;">{{$us->paternal}} </div>
		                        <div class="div-table-cell" style="width: 15%;">{{$us->ci}}</div>
		                        <div class="div-table-cell" style="width: 12%;">{{$us->cellphone}}</div>
		                        <div class="div-table-cell" style="width: 9%;">
		                            <a class="btn btn-success" href="{{ route('secretary.edit', $us->iduser)}}"><i class="zmdi zmdi-refresh"></i></a>
		                        </div>
		                        <div class="div-table-cell" style="width: 9%;">
                            	<form method="POST" action="{{ route('secretary.destroy', $us->iduser)}}">
		                     		@csrf
		                    		@method('DELETE')
		                    	    <button class="btn btn-danger" onclick="return confirm('Esta seguro de eliminar el registro?')"><i class="zmdi zmdi-delete"></i></button>
	                          	</form>
		                        </div>
		                    </div>
		                </div>
		            </div>
                @endforeach
            </div>
        </div>
@endsection