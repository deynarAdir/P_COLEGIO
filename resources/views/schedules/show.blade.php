@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 class="all-tittles">Ingreso y Salida</h1>
    </div>
</div>
<div class="container-fluid">
    <h2 class="text-center all-tittles" style="clear: both; margin: 25px 0;">Detalle de ingreso y salida</h2>
    <div class="table-responsive">
        <div class="div-table" style="margin:0 !important;">
            <div class="div-table-row div-table-row-list" style="background-color:#DFF0D8; font-weight:bold;">
                <div class="div-table-cell" style="width: 15%;">Nombre</div>
                <div class="div-table-cell" style="width: 15%;">Apellidos</div>
                <div class="div-table-cell" style="width: 15%;">Rol</div>
                <div class="div-table-cell" style="width: 15%;">Dia</div>
                <div class="div-table-cell" style="width: 15%;">Hora Entrada</div>
                <div class="div-table-cell" style="width: 15%;">Hora Salida</div>
            </div>
        </div>
        @foreach($dates as $d)
        <div class="table-responsive">
            <div class="div-table" style="margin:0 !important;">
                <div class="div-table-row div-table-row-list">
                    <div class="div-table-cell" style="width: 15%;">{{ $d->name}}</div>
                    <div class="div-table-cell" style="width: 15%;">{{ $d->paternal}} {{$d->maternal}}</div>
                    <div class="div-table-cell" style="width: 15%;">{{ $d->description1}}</div>
                    <div class="div-table-cell" style="width: 15%;">{{ $d->description}}</div>
                    <div class="div-table-cell" style="width: 15%;">{{ $d->hour_entry}}</div>
                    <div class="div-table-cell" style="width: 15%;">{{ $d->hour_exit}}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection