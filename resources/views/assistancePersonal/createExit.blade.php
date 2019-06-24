@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 class="all-tittles">Ingreso y Salida</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div id="alert" style="height: 50px;" class="alert alert-info col-md-10 col-md-offset-1"></div>
    </div>
</div>

<div class="conteiner-fluid">
    <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
        <li role="presentation"><a href="{{ route('assistancePersonal.create') }}">Ingreso de personal</a></li>
        <li role="presentation"  class="active"><a href="#">Salida de personal</a></li>

    </ul>
</div>
<div class="container-fluid">
    <div class="container-flat-form">
        <div class="title-flat-form title-flat-blue">Marcar salida de asistencia</div>
        {!! Form::open(array('action' => 'AdminControlController@storeExit','method'=>'POST', 'id'=>'frmA')) !!}
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <div class="row">
            <div class="col-md-12 col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-6"><br><br>
                        <div class="group-material">
                            <input type="text" class="material-control tooltips-general" placeholder="Ej: 6549875" pattern="[0-9 ]{1,50}" required="" maxlength="10" data-toggle="tooltip" data-placement="top" title="Ingrese su numero de carnet de identidad" name="ci" id="ci">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Ingrese su CI</label>
                        </div>
                    </div>
                    <div class="col-md-6"><br><br>
                        <div class="group-material">
                            <input type="text" class="material-control tooltips-general" placeholder="Entre 0 y 1" pattern="[0-1]{1,50}"  maxlength="1" data-toggle="tooltip" data-placement="top" title="Ingrese una cantidad" name="extra" id="extra">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Actividades extras</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="group-material">
                            <label>Hora de salida</label><br><br>
                            <input type="text" class="material-control tooltips-general" disabled maxlength="50" data-toggle="tooltip" data-placement="top" title="Hora de llegada del usuario" name="timeEnd" value="{{ date('Y-m-d')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="group-material">
                            <label>Fecha</label><br><br>
                            <input type="text" class="material-control tooltips-general" disabled maxlength="50" data-toggle="tooltip" data-placement="top" title="Hora de llegada del usuario" value="{{ date('H:i')}}">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <p class="text-center">
            <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
            <button type="submit" class="btn btn-primary" id="Btnsend"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
        </p>
        {!! Form::close() !!}
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('#alert').hide();
    });

    $(function(){
        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
       });

        $('#Btnsend').click(function(event) {

            ci=$("#ci").val()
            if(ci!="" ){
                ex = $("#extra").val();
                if(ex=="" || ex==0 || ex==1){
                    event.preventDefault();
                    var formId = '#frmA';
                    $.ajax({
                        url: $(formId).attr('action'),
                        type: $(formId).attr('method'),
                        data: $(formId).serialize(),
                        dataType: 'json',
                        success: function (msg) {

                            $('#alert').html(msg.message);
                            $('#alert').show();
                        },
                        error: function(){
                            console.log('Error');
                        }
                    });
                    limpiar();
                }else{
                    alert('El formato del campo actividades extras es invalido');
                }
            }else{
                alert("Ingrese su CI para marcar su salida");
            }
        });

    });
    function limpiar(){
        $("#ci").val("");
    }

</script>
@endsection