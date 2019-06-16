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
        @foreach($payment as $p)
          <div class="row border">
            <div class="col-md-4 col-sm-12 col-12">
              <div class="group-material">
                  <input type="text" class="material-control tooltips-general" placeholder="Introduzca el CI del estudiante" pattern="[0-9-]{1,10}" required="" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente números y guiones, 10 dígitos" value="{{ $p->ci }}">
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>C.I de Estudiante:</label>
              </div>
              <input type="text" hidden name="id_student" id="id_student">
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="group-material">
                  <input type="text" class="material-control tooltips-general" placeholder="Nombre del estudiante" maxlength="30" data-toggle="tooltip" data-placement="top" title="Es un campo autocompletado" value="{{ $p->name }} {{ $p->paternal }} {{ $p->maternal }}">
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Estudiante:</label>
              </div>
            </div>
            <div class="col-md-4 col-sm-12 col-12">
              <div class="group-material">
                  <input type="text" class="material-control tooltips-general" placeholder="Introduzca el NIT o CI del apoderado" pattern="[0-9-]{1,10}" required="" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente números y guiones, 10 dígitos" value="{{ $p->nit_ci }}">
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>C.I del apoderado:</label>
              </div>
            </div>
          </div>
          <div class="row border">
            <div class="col-md-3 col-sm-12">
              <div class="group-material">
                  <input type="text" class="material-control tooltips-general" placeholder="Introduzca la serie de comprobante" pattern="[0-9-]{1,10}" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente números y guiones, 10 dígitos" value="{{ $p->invoice_series }}">
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Serie de la Factura:</label>
                  <span>Campo no obligatorio</span>
              </div>
            </div>
            <div class="col-md-3 col-sm-12">
              <div class="group-material">
                  <input type="text" class="material-control tooltips-general" placeholder="Introduzca el numero de comprobante" pattern="[0-9-]{1,10}" required="" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente números y guiones, 10 dígitos" value="{{ $p->invoice_number }}">
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Numero de la Factura:</label>
              </div>
            </div>
            @endforeach
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
                        <th>Descuento</th>
                        <th>Sub Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      {{ $c=0 }}
                      @foreach($detalles as $d)
                      {{ $subt = ($d->price * $d->discount) / 100 }}
                      <tr>
                        <td>{{ $c++ }}</td>
                        <td>{{ $d->description }}</td>
                        <td>{{ $d->price }}</td>
                        <td>{{ $subt}}</td>
                        <td>{{ $d->price - $subt}}</td>
                      </tr>
                      @endforeach
                      @foreach($payment as $p)
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>Total:</strong></td>
                        <td colspan="4" rowspan="" headers="">{{ $p->total_payment }}</td>
                      </tr>
                      @endforeach
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