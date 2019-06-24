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
              <span class="text-danger" id="error_ci_student"></span>
            </div>

            <input type="text" hidden name="id_student" id="id_student">
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="group-material">
              <input type="text" class="material-control tooltips-general" placeholder="Nombre del estudiante" maxlength="30" data-toggle="tooltip" data-placement="top" title="Es un campo autocompletado" id="nombre-estudiante">
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Estudiante:</label>
            </div>
            <div class="col-md-3 col-sm-12">
              <div class="group-material">
                  <input type="text" class="material-control tooltips-general" placeholder="Introduzca el numero de comprobante" pattern="[0-9-]{1,10}" required="" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente números y guiones, 10 dígitos" name="invoice_number" id="invoice_number">
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Numero de la Factura:</label>
                  <span class="text-danger" id="error_invoice_number"></span>
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="group-material">
                  <label>Ver mensualidades:</label>
               </div>
          </div>
          <div class="col-md-4 col-sm-12 col-12">
            <div class="group-material">
              <input type="text" class="material-control tooltips-general" placeholder="Introduzca el NIT o CI del apoderado" pattern="[0-9-]{1,10}" required="" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente números y guiones, 10 dígitos" id="nit_ci" name="nit_ci">
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>C.I del apoderado:</label>
              <span class="text-danger" id="error_nit_ci"></span>
            </div>
          </div>
        </div>
        <div class="row border">
          <div class="col-md-3 col-sm-12">
            <div class="group-material">
              <input type="text" class="material-control tooltips-general" placeholder="Introduzca la serie de comprobante" pattern="[0-9-]{1,10}" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente números y guiones, 10 dígitos" name="invoice_series" id="invoice_series" required>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Serie de la Factura:</label>
              <span class="text-danger" id="error_invoice_series"></span>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="group-material">
              <input type="text" class="material-control tooltips-general" placeholder="Introduzca el numero de comprobante" pattern="[0-9-]{1,10}" required="" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente números y guiones, 10 dígitos" name="invoice_number" id="invoice_number">
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Numero de la Factura:</label>
              <span class="text-danger" id="error_invoice_number"></span>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="group-material">
              <input type="text" class="material-control tooltips-general" placeholder="Mensualidad" data-toggle="tooltip" data-placement="top" title="Es un campo autocompletado" id="description-1">
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Nombre de mensualidad:</label>
            </div>
          </div>
          <div class="form-group col-md-2">
            <button type="button" class="btn btn-info" id="btn-mensualidades">...</button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Detalle de Ingreso de Articulos</h2>
                <div class="clearfix"></div>
                <span class="text-danger" id="error_mensualidades"></span>
              </div>
              <div class="x_content table-responsive">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nº</th>
                      <th>Descripcion de pago</th>
                      <th>Precio</th>
                      <th>Descuento</th>
                      <th>SubTotal</th>
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
            <a href="{{ route('pagos.index') }}" class="btn btn-secondary">Cerrar</a>
            <button class="btn btn-success" id="agregar">Aceptar</button>
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
            <div class="x_content table-responsive">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Id Mensualidad</th>
                    <th class="text-center">Descripcion</th>
                    <th class="text-center">Fecha inicio</th>
                    <th class="text-center">Fecha final</th>
                    <th class="text-center">Precio</th>
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
  let id_student = 0;
  let descuento;
  let total_pago;
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
          $('#id_student').val(data.student.iduser);
          id_student = $('#id_student').val();
          if(data.student.paternal == "" || data.student.paternal == null){
            $('#nombre-estudiante').val(data.student.name+" "+data.student.maternal);
          }else if(data.student.maternal == "" || data.student.maternal == null){
            $('#nombre-estudiante').val(data.student.name+" "+data.student.paternal);
          }else{
            $('#nombre-estudiante').val(data.student.name+" "+data.student.paternal+" "+data.student.maternal);
          }
        }
      });
    }
  });
  console.log(stu);
  $('#btn-mensualidades').click(function() {
    let juntar;
    $.ajax({
      url: "{{ url('obtener/mensualidades') }}/"+id_student,
      method: "GET",
      success: function(data){
        console.log(data.discount);
        console.log(data.feeStudent.data);
        descuento = data.discount;
        for (var i = 0;i<data.feeStudent.data.length;i++) {
<<<<<<< HEAD
            juntar+=`<tr>
              <td> ${data.feeStudent.data[i].idstudent_fee} </td>
              <td> ${data.feeStudent.data[i].description} cuota(s) </td>
              <td> ${data.feeStudent.data[i].start_date} </td>
              <td> ${data.feeStudent.data[i].end_date} </td>
              <td> ${data.feeStudent.data[i].price} </td>
              <td>
                <button type="button" class="btn btn-success btn-xs seleccionado modal-ml"
                    data-id="${data.feeStudent.data[i].idstudent_fee}"
                    data-description="${data.feeStudent.data[i].description}"
                    data-precio="${data.feeStudent.data[i].price}">
                    <i class="glyphicon glyphicon-plus"></i>
                </button>
              </td>
=======
          juntar+=`<tr>
          <td> ${data.feeStudent.data[i].idstudent_fee} </td>
          <td> ${data.feeStudent.data[i].description} </td>
          <td> ${data.feeStudent.data[i].start_date} </td>
          <td> ${data.feeStudent.data[i].end_date} </td>
          <td> ${data.feeStudent.data[i].price} </td>
          <td>
          <button type="button" class="btn btn-success btn-xs seleccionado modal-ml"
          data-id="${data.feeStudent.data[i].idstudent_fee}"
          data-description="${data.feeStudent.data[i].description}"
          data-precio="${data.feeStudent.data[i].price}">
          <i class="glyphicon glyphicon-plus"></i>
          </button>
          </td>
>>>>>>> c0a2e9dfe2102529bb6909464a82426d96bf140d
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
    let price = $(this).data('precio');
    if(verificarRepetido(id)){
      alert('Se esta repitiendo el pago');
    }else{
      mensualidades.push(
      {
        mensualidad_id: id,
        descripcion: descripcion,
        price: price
      }
      );
      $('#modal-mensualidades').modal('hide');
      $('#id_mensualidad').val(id);
      $('#description-1').val(descripcion);
      juntarLlenado();
    }
    console.log(mensualidades);
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

  $('#llenado').on("click","button.eliminar-lista",function(){
    let id = $(this).data('indice');
    console.log(id);
    mensualidades.splice(id,1);
    juntarLlenado();
  });
  function juntarLlenado(){
    let juntar2;
    descuento = (mensualidades[0].price * descuento)/100;
    let sumador=0;
    for (var i = 0;i<mensualidades.length;i++) {
      juntar2+=`<tr>
      <td> ${mensualidades[i].mensualidad_id} </td>
      <td> ${mensualidades[i].descripcion} </td>
      <td> ${mensualidades[i].price} </td>
      <td> ${descuento} </td>
      <td> ${mensualidades[i].price - descuento} </td>
      <td>
      <button type="button" class="btn btn-danger btn-xs eliminar-lista modal-ml"
      data-id="${mensualidades[i].id}"
      data-indice="${i}">
      <i class="glyphicon glyphicon-plus"></i>
      </button>
      </td>
      </tr>`
      sumador=sumador+ parseFloat(mensualidades[i].price - descuento);
    }
    juntar2+=`<tr>
    <td></td>
    <td></td>
    <td></td>
    <td><strong>   Total Pago:</strong> </td>
    <td colspan="4" rowspan="" headers="">${sumador}</td>
    </tr>`;
    $('#llenado').html(juntar2);
    total_pago = sumador;
    console.log(total_pago);
    console.log(mensualidades);
  }

  $('#agregar').click(function() {
    let id_student = $('#id_student').val();
    let nit_ci = $('#nit_ci').val();
    let invoice_series = $('#invoice_series').val();
    let invoice_number = $('#invoice_number').val();
    let total_payment = total_pago;
    $.ajax({
      url: "{{ url('pagos') }}",
      headers: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
      method: "POST",
      data: {
        id_student,nit_ci,invoice_series,invoice_number,total_payment,mensualidades
      },
      success: function(data){
        window.open('http://localhost:8080/colegio/public/pago/pdf/'+data.id,'_blank');
        console.log(data.id);
        location.href = '{{ route('pagos.index') }}';
      },
      error: function(result) {
        console.log(result);
        if(result.status == 422){
          if(result.responseJSON.errors.id_student != null){
            $('#error_ci_student').html(`<strong>!Error</strong> el estudiante no esta definido`);
          }else{
            $('#error_ci_student').html(``);
          }
          if(result.responseJSON.errors.nit_ci != null){
            $('#error_nit_ci').html(`<strong>!Error</strong> ${result.responseJSON.errors.nit_ci}`);
          }else{
            $('#error_nit_ci').html(``);
          }
          if(result.responseJSON.errors.invoice_series != null){
            $('#error_invoice_series').html(`<strong>!Error</strong> ${result.responseJSON.errors.invoice_series}`);
          }else{
            $('#error_invoice_series').html(``);
          }
          if(result.responseJSON.errors.invoice_number != null){
            $('#error_invoice_number').html(`<strong>!Error</strong> ${result.responseJSON.errors.invoice_number}`);
          }else{
            $('#error_invoice_number').html(``);
          }
          if(result.responseJSON.errors.mensualidades != null){
            $('#error_mensualidades').html(`<strong>!Error</strong> ${result.responseJSON.errors.mensualidades}`);
          }else{
            $('#error_mensualidades').html(``);
          }
        }
      }
    });
  });
</script>
@endsection