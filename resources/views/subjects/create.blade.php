@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Nueva Materia</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
                <li class="active">Agregar nueva materia</li>
                <li><a href="{{ url('materias') }}">Listado de Materias</a></li>
            </ol>
        </div>
    </div>
</div>

{!!Form::open(array('url'=>'subjects','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
<div class="container-fluid">
    <form autocomplete="off">
        <div class="container-flat-form">
            <div class="title-flat-form title-flat-blue">Asignar Materias</div>
            <div class="row">
               <div class="col-xs-12 col-sm-8 col-sm-offset-2">                   
                    <div class="row">
                        <div class="group-material ">
                            <input type="text" class="material-control tooltips-general" placeholder="" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="name">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Materia</label>
                        </div> 
                        <div class="group-material col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <span>Grado</span>
                            <select class="tooltips-general material-control" name="pdegree" id="pdegree" data-toggle="tooltip" data-placement="top" title="Elija el Grado">
                                @foreach($degree as $deg)
                                <option value="{{$deg->iddegree}}"> {{$deg->name}}</option>
                                 @endforeach
                            </select>
                        </div>    
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <br>
                            <div class="form-group">
                               <button type="button" id="bt_add" class="btn btn-primary"><i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar Grado</button>
                            </div>
                        </div>
                        <div class="table-responsive div-table col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <table id="details" class="table">
                              <thead>
                                  <th class="div-table-cell">Materia</th>
                                  <th class="div-table-cell">Grado</th>                         
                              </thead>
                              <tbody>
                                
                              </tbody>
                            </table>
                        </div>
                        
                    </div>   
                    <p class="text-center">
                        <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                    </p>
               </div>
           </div>
        </div>
    </form>
</div>
{!!Form::close()!!}

<!-- desd aca podremos empezar a utilizar js  -->
@push('script')
<script>

    $(document).ready(function(){
        $('#bt_add').click(function(){
            addSubject();
        });
    });

    var cont = 0;
    function addSubject(){
        iddegree=$("#pdegree").val();
        console.log(iddegree);
        degree=$("#pdegree option:selected").text();
        var fila='<tr class="selected" id="fila'+cont+'"><td class="div-table-cell"><input type="hidden" name="iddegree[]" value="'+iddegree+'">'+degree+'</td> <td  class="div-table-cell"><button  type="button" class="btn btn-warning " onclick="eliminar('+cont+')">X</button></td></tr>';
        cont++;   
        $('#details').append(fila);
    }



    function eliminar(index){
        $("#fila"+index).remove();
    }

</script>
@endpush
<!-- fin del codigo js -->
@endsection