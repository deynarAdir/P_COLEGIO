@extends('layouts.app')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 class="all-tittles">Pagos</h1>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 lead">
      <ol class="breadcrumb">
        <li class="active">Agregar nuevo</li>
        <li><a href="{{ route('treasurer.index') }}">Listado de pagos realizados</a></li>
      </ol>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="container-flat-form">
    <div class="title-flat-form title-flat-blue">Nuevo Pago Personal</div>
    <form method="POST" action="{{ route('treasurer.store')}}" enctype="multipart/form-data">
      @csrf
      <div class="row">
       <div class="col-xs-12 col-sm-10 col-sm-offset-1">
        <div class="row">
          <div class="col-md-4">
            <div class="group-material">
              <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el numero de carnet de identidad" pattern="[0-9 ]{1,15}" required="" maxlength="15" data-toggle="tooltip" data-placement="top" title="Escribe el CI del docente, solamente numeros" name="ci" id="ciPersonal">
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>CI</label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="group-material">
              <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el nombre del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,25}" required="" maxlength="25" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del docente" name="name" id="namePersonal">
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Nombre</label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="group-material">
              <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el apellido paterno del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,15}" required="" maxlength="15" data-toggle="tooltip" data-placement="top" title="Escribe el apellido paterno del docente" name="paternal" id="paternal">
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Apellido Paterno</label>
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="group-material">
              <input type="text" class="material-control tooltips-general" placeholder="Numero de factura" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,50}" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe el numero de factura" name="number" id="number">
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Numero de factura</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <center><legend>Tabla de sueldo</legend></center>
            <br>
            <div class="table-responsive">
              <div class="div-table" id="details" style="margin:0 !important;">
                <div class="div-table-row div-table-row-list" style="background-color:#DFF0D8; font-weight:bold;">
                  <div class="div-table-cell" style="width: 25%;">Haber basico</div>
                  <div class="div-table-cell" style="width: 25%;">Descuento</div>
                  <div class="div-table-cell" style="width: 25%;">Bonificaciones</div>
                  <div class="div-table-cell" style="width: 25%;">Total</div>
                </div>
              </div>
              <div class="table-responsive">
                <div class="div-table" style="margin:0 !important;">
                  <div class="div-table-row div-table-row-list selected" id="fila'+cont+'">
                    <div class="div-table-cell" style="width: 25%;"><input type="text" name="salary" id="salary" ></div>
                    <div class="div-table-cell" style="width: 25%;"><input type="text" name="descuento" id="descuento" ></div>
                    <div class="div-table-cell" style="width: 25%;"><input type="text" name="bonus" id="bonus" ></div>
                    <div class="div-table-cell" style="width: 25%;"><input type="text" name="bonus" id="total" ></div>
                  </div>
                </div>
              </div>

            </div><br>
          </div>
        </div>
        <p class="text-center">
          <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
          <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
        </p>
      </div>
    </div>
  </form>
</div>
</div>
@endsection
@section('script')
<script>
  var user = {!! $user !!};
  var us = user.map(function (user) {
    return user.ci;
  });
  $('#ciPersonal').autocomplete({
    source:us,
    select:function(event,item){
      var ci = item.item.value;
      $.ajax({
        url: "{{ url('get/personal') }}"+"/"+ci,
        method: "GET",
        success: function(data){
          $('#namePersonal').val(data.user.name);
          $('#paternal').val(data.user.paternal);
        }
      });
      $.ajax({
        url: "{{ url('get/salary') }}"+"/"+ci,
        method: "GET",
        success: function(data){
          $('#salary').val(data.salary.payment);
          $('#total').val(data.salary.payment);
        }
      });
      //consulta para descuento
      $.ajax({
        url: "{{ url('get/discount') }}"+"/"+ci,
        method: "GET",
        success: function(data){
          $('#descuento').val(data.discount);
          /*tot=$("#total").val();
          to=tot-data.discount;
          $('#total').val(to);*/
        }
      });
      //conslta para bonificaciones
      $.ajax({
        url: "{{ url('get/bonus') }}"+"/"+ci,
        method: "GET",
        success: function(data){
          $('#bonus').val(data.bonus);

          fin = $("#total").val();
          des = $("#descuento").val();
          final = fin-des+data.bonus;
          $('#total').val(final);
        }
      });

    }
  });
</script>
@endsection
