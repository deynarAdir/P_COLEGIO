@extends('layouts.app')
@section('content')
<div class="container">
	    <div class="page-header">
	      <h1 class="all-tittles">Sistema Estudiantil <small>Inicio</small></h1>
	    </div>
	</div>
	<section class="full-reset text-center" style="padding: 40px 0;">
	    <article class="tile">
	        <div class="tile-icon full-reset"><i class="zmdi zmdi-face"></i></div>
	        <div class="tile-name all-tittles">administradores</div>
	        <div class="tile-num full-reset">7</div>
	    </article>
	    <article class="tile">
	        <div class="tile-icon full-reset"><i class="zmdi zmdi-accounts"></i></div>
	        <div class="tile-name all-tittles">estudiantes</div>
	        <div class="tile-num full-reset">70</div>
	    </article>
	    <article class="tile">
	        <div class="tile-icon full-reset"><i class="zmdi zmdi-male-alt"></i></div>
	        <div class="tile-name all-tittles">docentes</div>
	        <div class="tile-num full-reset">11</div>
	    </article>
	</section>
	<div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	        <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
	        </div>
	        <div class="modal-body">
	            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore dignissimos qui molestias ipsum officiis unde aliquid consequatur, accusamus delectus asperiores sunt. Quibusdam veniam ipsa accusamus error. Animi mollitia corporis iusto.
	        </div>
	        <div class="modal-footer">
	            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
	        </div>
	    </div>
	  </div>
	</div>
@endsection
