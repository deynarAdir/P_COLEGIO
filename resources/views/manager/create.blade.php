@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
      <h1 class="all-tittles">Nueva Inscripcion</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="container-flat-form">
        <div class="title-flat-form title-flat-blue">Registrar nuevo Tutor</div>
        <form method="POST" action="{{ route('managers.store') }}">
            @csrf
            <div class="row">
               <div class="col-xs-12 col-sm-8 col-sm-offset-2">



                    <div class="col-md-4 col-sm-12 group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="ej: JOSE" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="name" title="Ingresa un nuevo curso">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Nombre</label>
                    </div>

                    <div class="col-md-4 col-sm-12 group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="ej: MIRANDA" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="paternal" title="Ingresa una cantdad">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>PATERNO</label>
                    </div>

                    <div class="col-md-4 col-sm-12 group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="ej: MIRANDA" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="maternal" title="Ingresa una cantdad">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>MATERNO</label>
                    </div>

                    <div class="col-md-4 col-sm-12 group-material">
                            <input type="text" class="material-control tooltips-general" placeholder="ej: MASCULINO" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="gender" title="Ingresa una cantdad">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>GENERO</label>
                    </div>
                    <div class="col-md-4 col-sm-12 group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="ej: ZONA B CALLE 2 Nª2" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="address" title="Ingresa una cantdad">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>DIRECCION</label>
                    </div>
                    <div class="col-md-4 col-sm-12 group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="ej: ejemplo@gmail.com" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="email" title="Ingresa una cantdad">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>EMAIL</label>
                    </div>
                    <div class="col-md-4 col-sm-12 group-material">
                        <input type="number" class="material-control tooltips-general" placeholder="ej: 8975464" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="ci" title="Ingresa una cantdad">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>CI</label>
                    </div>
                    <div class="col-md-4 col-sm-12 group-material">
                        <input type="number" class="material-control tooltips-general" placeholder="ej: 7485461" required="" maxlength="70" data-toggle="tooltip" data-placement="top" name="cellphone" title="Ingresa una cantdad">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>CELULAR</label>
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
