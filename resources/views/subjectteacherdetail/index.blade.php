@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Asignación Docentes</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-justify lead">
            Esta es la lista de Docentes contratados para la asignación de materias  
        </div>
    </div>
    <h2 class="text-center all-tittles">Lista de Docentes</h2>
    <div class="div-table">
        <div class="div-table-row div-table-head">
            <div class="div-table-cell">Apellidos Paterno</div>
            <div class="div-table-cell">Apellidos Materno</div>
            <div class="div-table-cell">Nombre</div>
            <div class="div-table-cell">CI</div>
            <div class="div-table-cell">Opcion</div>
        </div>  
        @foreach($teacher as $t)
            <div class="div-table-row">
                <div class="div-table-cell">{{ $t->paternal }}</div>
                <div class="div-table-cell"> {{ $t->maternal }}</div>
                <div class="div-table-cell">{{ $t->name }}</div>
                <div class="div-table-cell">{{ $t->ci }}</div>
                <div class="div-table-cell">
                    <a href="{{URL::action('SubjectTeacherDetailController@show',$t->iduser)}}"><button class="btn btn-info">Editar</button></a>
                </div>
            </div>
        @endforeach
        
    </div>                
</div>
@endsection