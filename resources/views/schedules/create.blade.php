@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 class="all-tittles">Configuracion de ingreso y salida</h1>
    </div>
</div>
<div class="conteiner-fluid">
    <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
        <li role="presentation"><a href="{{ route('schedulesPersonal.index') }}">Listado de personal Administrativo</a></li>
        <li role="presentation"  class="active"><a href="#">Asignar horario</a></li>
    </ul>
</div>
<div class="container-fluid">
    <div class="container-flat-form">
        <div class="title-flat-form title-flat-blue">Asignar ingreso y salida</div>
        <form method="POST" action="{{ route('schedulesPersonal.store') }}" enctype="multipart/form-data">

            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="group-material">
                                <input type="hidden" name="iduser" value="{{ $user->iduser}}">
                                <input type="text" class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" name="name" value="{{ $user->name }} {{ $user->paternal }} {{ $user->maternal }}">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Nombre y Apellido</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" name="paternal" value="{{ $user->ci }}">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>CI</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" name="ci" value="{{ $user->description1 }}">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Rol de usuario</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="group-material">
                                <input type="time" id="start_hour" class="material-control tooltips-general" placeholder="z ZZZ c CCC n NNN" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe la la hora de ingreso" name="hourEntry">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Hora de ingreso</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="group-material">
                                <input type="time" id="end_hour" class="material-control tooltips-general" placeholder="z ZZZ c CCC n NNN" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe la la hora de salida" name="hourExit">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Hora de salida</label>
                            </div>

                        </div>
                        <div class="col-md-2" id="formid">
                            <div class="group-material">
                                <span>Dia</span>
                                <select class="material-control tooltips-general" data-live-search="true" data-toggle="tooltip" data-placement="top" title="Elige el dia" name="day" id="day">
                                    @foreach($days as $day)
                                    <option value="{{$day->idday}}">{{ $day->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <p class="text-center">
                                <button type="button" id="bt_add" class="btn btn-primary"><i class="zmdi zmdi-check"></i> &nbsp;&nbsp; Agregar</button>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <center><legend>Ingreso y salida de personal</legend></center>
                            <br>
                            <div class="table-responsive">
                                <div class="div-table" id="details" style="margin:0 !important;">
                                    <div class="div-table-row div-table-row-list" style="background-color:#DFF0D8; font-weight:bold;">
                                        <div class="div-table-cell" style="width: 25%;">Dia</div>
                                        <div class="div-table-cell" style="width: 25%;">Hora Inicio</div>
                                        <div class="div-table-cell" style="width: 25%;">Hora Termino</div>
                                        <div class="div-table-cell" style="width: 25%;">Acciones</div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <div class="div-table" style="margin:0 !important;">

                                    </div>
                                </div>

                            </div><br>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center">
                <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                <button onclick="vacio()" type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
            </p>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('#bt_add').click(function(){
            addTime();
        });
    });

    var cont = 0;

    function addTime(){
        idday=document.getElementById('day').value;
        day = $("#day option:selected").text();

        start_hour=document.getElementById("start_hour").value;
        end_hour=$("#end_hour").val();

        var fila='<div class="div-table-row div-table-row-list selected" id="fila'+cont+'">    <div class="div-table-cell" style="width: 25%;"><input type="hidden" name="tidday[]" value="'+idday+'">'+day+'</div>      <div class="div-table-cell" style="width: 25%;"><input type="hidden" name="tstart_hour[]" value="'+start_hour+'">'+start_hour+'</div>      <div class="div-table-cell" style="width: 25%;"><input type="hidden" name="tend_hour[]" value="'+end_hour+'">'+end_hour+'</div>       <div class="div-table-cell" style="width: 25%;"><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')">X</button></div>     </div>';

        console.log(start_hour);
        cont++;
        limpiar();
        $('#details').append(fila);
    }

    function limpiar(){
        $("#start_hour").val("");
        $("#end_hour").val("");
    }

    function eliminar(index){
        $("#fila"+index).remove();
    }

   /* function vacio(){
        if(cont == 0){
            alert("Seleccione un horario!!");
            document.location.reload();
        }
    }*/

</script>
@endsection

