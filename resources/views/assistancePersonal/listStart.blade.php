@extends('layouts.app')
@section('content')
	 	<div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Sistema Educativo <small>Administración Usuarios</small></h1>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                        <li class="active">Asistencia entrada</li>
                        <li><a href="{{ route('assistancePersonal.indexOut')}}">Asistencias salida</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <form class="pull-right" style="width: 30% !important;" autocomplete="off" method="GET" action="{{ route('assistancePersonal.index') }}">
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
                        <div class="div-table-cell" style="width: 9%;">Marcar Asistencia</div>
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
		                        <div class="div-table-cell" style="width: 9%;">
		                            <a class="btn btn-success" href="{{ route('assistancePersonal.createStart', $us->iduser)}}"><i class="zmdi zmdi-refresh"></i></a>
		                        </div>
		                    </div>
		                </div>
		            </div>
                @endforeach
            </div>
        </div>
@endsection