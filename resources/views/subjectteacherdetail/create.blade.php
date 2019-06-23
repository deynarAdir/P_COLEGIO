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
            Bienvenido a la sección de asigancion de Materias par el docente {{$teacher->name}} {{$teacher->paternal}} {{$teacher->maternal}}
        </div>
    </div>
              
</div>
{!!Form::open(array('url'=>'subjectteacherdetail','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
<input type="text" id="idteacher" name="idteacher" value="{{$teachers->idteacher}}" hidden="" >
<div class="container-fluid">
    <form autocomplete="off">
        <div class="container-flat-form">
            <div class="title-flat-form title-flat-blue">Asignar Materias</div>
            <div class="row">
               <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <legend><strong>Materias</strong></legend><br>
                    
                    <div class="row">   
                        <div class="group-material col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <select class="tooltips-general material-control" name="psubject" id="psubject" data-toggle="tooltip" data-placement="top" title="Elija una Materia">
                                @foreach($subject as $sub)
                                <option value="{{$sub->idsubject_detail}}"> {{$sub->subject}}-{{$sub->degree}} </option>
                            @endforeach
                            </select>
                        </div>     
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <br>
                            <div class="form-group">
                               <button type="button" id="bt_add" class="btn btn-primary"><i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar Materia</button>
                            </div>
                        </div>
                        <div class="table-responsive div-table col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <table id="details" class="table">
                              <thead>
                                  <th class="div-table-cell">Materia</th>
                                  <th class="div-table-cell">Acciones</th>                         
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
        idsubject_detail=$("#psubject").val();
        console.log(idsubject_detail);
        subject=$("#psubject option:selected").text();
        var fila='<tr class="selected" id="fila'+cont+'"><td class="div-table-cell"><input type="hidden" name="idsubject_detail[]" value="'+idsubject_detail+'">'+subject+'</td> <td  class="div-table-cell"><button  type="button" class="btn btn-warning " onclick="eliminar('+cont+')">X</button></td></tr>';
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