@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 class="all-tittles">Configuracion de ingreso y salida</h1>
    </div>
</div>
<div class="conteiner-fluid">
    <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
        <li role="presentation"  class="active"><a href="#">Lista del personal Administrativo</a></li>
        <li role="presentation"><a href="#">Asignar horario</a></li>
    </ul>
</div>
<div class="container-fluid">
    <h2 class="text-center all-tittles" style="clear: both; margin: 25px 0;">Listado de secretarias</h2>
    <div class="table-responsive">
        <div class="div-table" style="margin:0 !important;">
            <div class="div-table-row div-table-row-list" style="background-color:#DFF0D8; font-weight:bold;">
                <div class="div-table-cell" style="width: 6%;">ID</div>
                <div class="div-table-cell" style="width: 15%;">Nombre</div>
                <div class="div-table-cell" style="width: 15%;">Apellidos</div>
                <div class="div-table-cell" style="width: 15%;">CI</div>
                <div class="div-table-cell" style="width: 12%;">Direccion</div>
                <div class="div-table-cell" style="width: 15%;">Rol de usuario</div>
                <div class="div-table-cell" style="width: 9%;">Asignar horario</div>
            </div>
        </div>
        @foreach($user as $us)
        <div class="table-responsive">
            <div class="div-table" style="margin:0 !important;">
                <div class="div-table-row div-table-row-list">
                    <div class="div-table-cell" style="width: 6%;">{{ $us->iduser }}</div>
                    <div class="div-table-cell" style="width: 15%;">{{ $us->name}}</div>
                    <div class="div-table-cell" style="width: 15%;">{{ $us->paternal}}     {{$us->maternal}}</div>
                    <div class="div-table-cell" style="width: 15%;">{{ $us->ci}}</div>
                    <div class="div-table-cell" style="width: 12%;">{{ $us->address}}</div>
                    <div class="div-table-cell" style="width: 15%;">{{ $us->description1}}</div>
                    <div class="div-table-cell" style="width: 9%;">
                      <a class="btn btn-success" href="{{ route('schedulesPersonal.create', $us->iduser)}}"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a>
                  </div>
              </div>
          </div>
      </div>
      @endforeach
  </div>
</div>
@endsection