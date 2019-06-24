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
                <li><a href="{{ route('secretary.create') }}">Agregar Nuevo</a></li>
                <li class="active">Listado </li>
            </ol>
        </div>
    </div>
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
                <div class="div-table-cell" style="width: 15%;">Titulo Academico</div>
                <div class="div-table-cell" style="width: 12%;">Celular</div>
                <div class="div-table-cell" style="width: 9%;">Actualizar</div>
            </div>
        </div>
        @foreach($user as $us)
        <div class="table-responsive">
            <div class="div-table" style="margin:0 !important;">
                <div class="div-table-row div-table-row-list">
                    <div class="div-table-cell" style="width: 6%;">{{ $us->idsecretary }}</div>
                    <div class="div-table-cell" style="width: 15%;">{{ $us->name}}</div>
                    <div class="div-table-cell" style="width: 15%;">{{ $us->paternal}} {{$us->maternal}}</div>
                    <div class="div-table-cell" style="width: 15%;">{{ $us->ci}}</div>
                    <div class="div-table-cell" style="width: 15%;">{{ $us->name_title}}</div>
                    <div class="div-table-cell" style="width: 12%;">{{ $us->cellphone}}</div>
                    <div class="div-table-cell" style="width: 9%;">
                      <a class="btn btn-success" href="{{ route('secretary.edit', $us->iduser)}}"><i class="zmdi zmdi-refresh"></i></a>
                  </div>
              </div>
          </div>
      </div>
      @endforeach
  </div>
</div>
@endsection