<div class="modal fade bd-example-modal-sm" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$p->assignment}}">
	{!!Form::model($p,['method'=>'PATCH','route'=>['notes.update',$p->assignment]])!!}
	{{Form::token()}}	
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Ingresar Notas</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<input type="hidden" id="assignment" value="3" enable>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<label for="b1">1° Bimestre</label>
							<input type="number" name="b1" value="{{$p->b1}}" class="form-control">
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<label for="b2">2° Bimestre</label>
							<input type="number" name="b2" value="{{$p->b2}}" class="form-control">
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<label for="b3">3° Bimestre</label>
							<input type="number" name="b3" value="{{$p->b3}}" class="form-control">
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<label for="b4">4° Bimestre</label>
							<input type="number" name="b4" value="{{$p->b4}}" class="form-control">
						</div>
					</div>		
				</div>
			</div>
			<div class="modal-footer">
				<button  type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{!!Form::close()!!}   
	
</div>