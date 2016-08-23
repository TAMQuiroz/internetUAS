<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="studentResult-new">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">{{ $title }}</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<form class="form-horizontal form-label-left">               
							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Identificador <span class="error">* </span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="studentResult-new-identifier" class="form-control col-md-7 col-xs-12" type="text" name="identifier" maxlength="1">
								</div>
							</div>
							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción <span class="error">* </span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea id="studentResult-new-description" class="resizable_textarea form-control" name="description"  style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Ciclo de Registro</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="studentResult-new-cicle" class="form-control col-md-7 col-xs-12" type="text" name="registrationCycle" value="2016-1" disabled>
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>

			<div class="modal-footer">
				<a class="btn btn-default submit" data-dismiss="modal">Cerrar</a>
				<a data-dismiss="modal" href="" class="btn btn-success submit" id="btn-save-new">Guardar</a>
			</div>
		</div>
	</div>
</div>
