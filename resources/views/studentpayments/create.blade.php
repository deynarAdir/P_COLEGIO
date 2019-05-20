@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Nuevo pago</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
                <li class="active">Agregar nuevo</li>
                <li class="active"><a href="{{ route('pagos.index') }}">Listado de pagos</a></li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <div class="title-flat-form title-flat-blue">Registrar nuevo pago</div>
        <br>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row border">
          <div class="col-md-4 col-sm-12 col-12">
            <div class="group-material">
                <input type="text" class="material-control tooltips-general" placeholder="Introduzca el CI del estudiante" pattern="[0-9-]{1,10}" required="" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente números y guiones, 10 dígitos" id="ci_autocomplete">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>C.I de Estudiante:</label>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="group-material">
                <input type="text" class="material-control tooltips-general" placeholder="Nombre del estudiante" maxlength="30" data-toggle="tooltip" data-placement="top" title="Es un campo autocompletado" id="nombre-estudiante">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Estudiante:</label>
            </div>
          </div>
          <div class="col-md-4 col-sm-12 col-12">
            <div class="group-material">
                <input type="text" class="material-control tooltips-general" placeholder="Introduzca el NIT o CI del apoderado" pattern="[0-9-]{1,10}" required="" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente números y guiones, 10 dígitos" id="ci_apoderado">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>C.I del apoderado:</label>
            </div>
          </div>
        </div>
        <div class="row border">
          <div class="col-md-4 col-sm-12">
            <div class="group-material">
                <span>Tipo de Comprobante</span>
                <select class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige un tipo" id="tipo_comprobante" required="">
                    <option value="" disabled="" selected="">Selecciona un tipo</option>
                    <option value="Factura">Factura</option>
                    <option value="Boleta">Boleto</option>
                    <option value="Ticket">Ticket</option>
                </select>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="group-material">
                <input type="text" class="material-control tooltips-general" placeholder="Introduzca la serie de comprobante" pattern="[0-9-]{1,10}" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente números y guiones, 10 dígitos">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Serie comprobante:</label>
                <span>Campo no obligatorio</span>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="group-material">
                <input type="text" class="material-control tooltips-general" placeholder="Introduzca el numero de comprobante" pattern="[0-9-]{1,10}" required="" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente números y guiones, 10 dígitos">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Numero de comprobante:</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-12">
              <div class="group-material">
                <input type="text" class="material-control tooltips-general" placeholder="Introduzca el CI del estudiante" pattern="[0-9-]{1,10}" required="" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente números y guiones, 10 dígitos" id="description-1">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Nombre de mensualidad:</label>
             </div>
          </div>
          <div class="form-group col-md-2">
            <button class="btn btn-info" id="btn-mensualidades">...</button>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="group-material">
                <input type="textarea" class="material-control tooltips-general" placeholder="Introduzca cualquier observacion" maxlength="100" data-toggle="tooltip" data-placement="top" title="No es un campo obligatorio">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Observacion:</label>
             </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Detalle de Ingreso de Articulos</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content table-responsive">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nº</th>
                      <th>Descripcion de pago</th>
                      <th>Precio</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody id="llenado">

                  </tbody>
                </table>
                <div >
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <button class="btn btn-secondary">Cerrar</button>
            <button class="btn btn-success">Aceptar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal inmodal" id="modal-mensualidades" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Lista de actividades a cobrar</h2>
                <div class="nav navbar-right">
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="form-group m-4">
                <input type="text" class="form-control" placeholder="Buscar" id="buscar-mensualidades">
              </div>
              <div class="x_content table-responsive">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Id Mensualidad</th>
                      <th class="text-center">Descripcion</th>
                      <th class="text-center">Fecha inicio</th>
                      <th class="text-center">Fecha final</th>
                      <th class="text-center">Accion</th>
                    </tr>
                  </thead>
                  <tbody id="tabla-mensualidades">
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
  let mensualidades = [];
  var arr = ['hola','como','estas'];
  var students = {!! $students !!};
  console.log(students);
  var stu = students.map( e => e.ci);
  $('#ci_autocomplete').autocomplete({
    source:stu,
    select:function(event,item){
      var ci_est = item.item.value;
      console.log(ci_est);
      $.ajax({
        url: "{{ url('obtener/estudiante') }}"+"/"+ci_est,
        method: "GET",
        success: function(data){
          console.log(data);
          $('#nombre-estudiante').val(data.student.name+" "+data.student.paternal+" "+data.student.maternal);
        }
      });
    }
  });
  console.log(stu);
    
  $('#buscar-mensualidades').keyup(function() {
    let juntar3;
    let pal = $('#buscar-mensualidades').val();
    console.log(pal);
    $.ajax({
      url: "{{ url('mensualidad/buscar') }}",
      method: "GET",
      data: {
        buscar: pal
      },
      success: function(data){
        console.log(data.monthlypayments.data); 
        for (var i = 0;i<data.monthlypayments.data.length;i++) {
            juntar3+=`<tr>
              <td> ${data.monthlypayments.data[i].idmonthly_payment} </td>
              <td> ${data.monthlypayments.data[i].description} </td>
              <td> ${data.monthlypayments.data[i].start_date} </td>
              <td> ${data.monthlypayments.data[i].end_date} </td>
              <td>
                <button type="button" class="btn btn-success btn-xs seleccionado modal-ml"
                    data-id="${data.monthlypayments.data[i].idmonthly_payment}"
                    data-description="${data.monthlypayments.data[i].description}">
                    <i class="glyphicon glyphicon-plus"></i>
                </button>
              </td>
          </tr>`;
        }
        $('#tabla-mensualidades').html(juntar3);
      }
    });
  });
  $('#btn-mensualidades').click(function() {
    let juntar;
    $.ajax({
      url: "{{ url('obtener/mensualidades') }}",
      method: "GET",
      success: function(data){
        console.log(data.monthly.data); 
        for (var i = 0;i<data.monthly.data.length;i++) {
            juntar+=`<tr>
              <td> ${data.monthly.data[i].idmonthly_payment} </td>
              <td> ${data.monthly.data[i].description} </td>
              <td> ${data.monthly.data[i].start_date} </td>
              <td> ${data.monthly.data[i].end_date} </td>
              <td>
                <button type="button" class="btn btn-success btn-xs seleccionado modal-ml"
                    data-id="${data.monthly.data[i].idmonthly_payment}"
                    data-description="${data.monthly.data[i].description}">
                    <i class="glyphicon glyphicon-plus"></i>
                </button>
              </td>
          </tr>`;
        }
        $('#tabla-mensualidades').html(juntar);
      }
      
    });
    $('#modal-mensualidades').modal('show');
  });

  $('#tabla-mensualidades').on("click","button.seleccionado",function(){
      let id = $(this).data('id');
      let descripcion = $(this).data('description');
      if(verificarRepetido(id)){
        alert('Se esta repitiendo el pago');
      }else{
        mensualidades.push(
          {
            mensualidad_id: id,
            descripcion: descripcion
          }
        );
        $('#modal-mensualidades').modal('hide');
        $('#id_mensualidad').val(id);
        $('#description-1').val(descripcion);
        let juntar2;
        for (var i = 0;i<mensualidades.length;i++) {
            juntar2+=`<tr>
              <td> ${mensualidades[i].mensualidad_id} </td>
              <td> ${mensualidades[i].descripcion} </td>
          </tr>`;
        }
        $('#llenado').html(juntar2);
        console.log(mensualidades);
      }
  });
  function verificarRepetido(id){
    let sw=false;
    for(let i=0;i<mensualidades.length;i++){
      if(mensualidades[i].mensualidad_id == id){
        sw=true;
      }
    }
    return sw;
  }
</script>
@endsection