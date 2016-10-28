<div class="remodal" data-remodal-id="filter-tutors" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div class="text-left">
    <p style="font-size: 18px"><strong>Filtros de búsqueda</strong></p>
    <p style="font-size: 16px">Selecciones uno o más filtros:</p>
  </div>
  <form class="form-horizontal" method="GET" action="{{$route}}">
  		<div class="form-group">
			<label class="control-label col-md-4 col-sm-4 col-xs-6">Estado</label>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<select name="estado" class="form-control">					
					<option value="1">Activo</option>
					<option value="0">Inactivo</option>					                        
				</select> 
			</div>			
		</div>
		<div class="form-group">
			<label class="control-label col-md-4 col-sm-4 col-xs-6">Nombre</label>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<input class="form-control" type="text" name="name">
			</div>			
		</div>
		<div class="form-group">
			<label class="control-label col-md-4 col-sm-4 col-xs-6">Apellido Paterno</label>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<input class="form-control" type="text" name="lastName">
			</div>			
		</div>
		<div class="form-group">
			<label class="control-label col-md-4 col-sm-4 col-xs-6">Apellido Materno</label>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<input class="form-control" type="text" name="secondLastName">
			</div>			
		</div>	
		<div class="form-group">
			<button data-remodal-action="cancel" class="btn btn-danger">Cancelar</button>
			<button class="btn btn-submit" type="submit"><i class="fa fa-search"></i> Buscar</button>
		</div>
	</form>
</div>



