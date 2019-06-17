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
                        <li><a href="{{ route('assistancePersonal.index')}}">Asistencias entrada</a></li>
                        <li class="active">Asistencia salida</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <h2 class="text-center all-tittles" style="clear: both; margin: 25px 0;">Lista de docentes ingresados</h2>
            <div class="table-responsive">
                <div class="div-table" style="margin:0 !important;">
                    <div class="div-table-row div-table-row-list" style="background-color:#DFF0D8; font-weight:bold;">
                        <div class="div-table-cell" style="width: 6%;">ID</div>
                        <div class="div-table-cell" style="width: 15%;">Nombre</div>
                        <div class="div-table-cell" style="width: 15%;">Apellidos</div>
                        <div class="div-table-cell" style="width: 15%;">CI</div>
                        <div class="div-table-cell" style="width: 9%;">Marcar Salida</div>
                    </div>
                </div>
                @foreach($user as $us)
		            <div class="table-responsive">
		                <div class="div-table" style="margin:0 !important;">
		                    <div class="div-table-row div-table-row-list">
		                        <div class="div-table-cell" style="width: 6%;">{{$us->idadmin_control}}</div>
	                            <div class="div-table-cell" style="width: 15%;">{{$us->user->name}}</div>
	                            <div class="div-table-cell" style="width: 15%;">{{$us->user->paternal}} </div>
		                        <div class="div-table-cell" style="width: 15%;">{{$us->user->ci}}</div>
		                        <div class="div-table-cell" style="width: 9%;">
		                            <a class="btn btn-success" href="{{ route('assistancePersonal.createEnd',  $us->idadmin_control)}}"><i class="zmdi zmdi-refresh"></i></a>
		                        </div>
		                    </div>
		                </div>
		            </div>
                @endforeach
            </div>
        </div>
@endsection