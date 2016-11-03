<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" id="filter-evaluations">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>            
				<div class="text-left">
					<p style="font-size: 18px"><strong>Filtros de búsqueda</strong></p>
					<p style="font-size: 16px">Seleccione uno o más filtros:</p>
				</div>    
			</div>
			<div class="modal-body" >				
				<form method="GET" action="{{$route}}" class="form-horizontal" >		

					<div class="form-group">
						{{Form::label('Nombre:',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-6'])}}
						<div class="col-md-6 col-sm-6 col-xs-6">
							<input type="text" name="nombre" placeholder="Escriba el nombre de la evaluación" maxlength="30">
						</div>   
					</div>
					<div class="form-group">
						{{Form::label('Estado:',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-6'])}}
						<div class="col-md-6 col-sm-6 col-xs-6">
							<select name="estado" class="form-control">
								<option value="">Todas</option>					
								<option value="2">Activa</option>					
								<option value="3">Inactiva</option>					
								<option value="1">Registrada</option>					
								<option value="0">Cancelada</option>
							</select>                       
						</div>   			                                                      
					</div> 
					<div class="form-group">
						<button data-dismiss="modal" class="btn btn-danger">Cancelar</button>
						<button class="btn btn-submit" type="submit"><i class="fa fa-search"></i> Buscar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

