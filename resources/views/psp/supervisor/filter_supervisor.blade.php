<div class="remodal" data-remodal-id="filter" role="dialog">
  	<button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  	<div class="text-left">
    	<p><strong>Filtros de búsqueda</strong></p>
  	</div>

  	{{Form::open(['route' => $route, 'method' => 'GET', 'class' => 'form-horizontal'])}}
		<div class="form-group">
			<label class="control-label col-md-4 col-sm-4 col-xs-6 label-modal">Nombre</label>
			<div class="col-md-6 col-sm-6 col-xs-6">
				{{Form::text('nombres', null, ['class' => 'form-control input-modal', 'maxlength' => 30])}}
			</div>			
		</div>
	
		<div class="form-group">
			<button class="btn btn-danger" data-remodal-action="cancel" >Cancelar</button>
			<button class="btn btn-submit" type="submit"><i class="fa fa-search"></i> Buscar</button>
		</div>
	{{Form::close()}}
</div>