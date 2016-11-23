<div class="remodal" data-remodal-id="filter-coords" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
	<button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
	<div class="text-left">
		<p style="font-size: 18px"><strong>Filtros de búsqueda</strong></p>
		<p style="font-size: 16px">Seleccione uno o más filtros:</p>
	</div>
	<form method="GET" action="{{$route}}">
		<div class="flex-container is-wrap has-space-between"> 
			<div class="flex-element input-container">
	            <label class="label-input label-modal">Nombre</label>
	            <input class="input-filter input-modal" type="text" name="name" maxlength="30">
	        </div>
	        <div class="flex-element input-container">
	            <label class="label-input label-modal">Apellido Paterno</label>
	            <input class="input-filter input-modal" type="text" name="lastName" maxlength="30">
	        </div>
	        <div class="flex-element input-container">
	            <label class="label-input label-modal">Apellido Materno</label>
	            <input class="input-filter input-modal" type="text" name="secondLastName" maxlength="30">
	        </div>
		</div>		
		<div class="flex-container has-flex-end" style="margin-top: 15px">
			<button data-remodal-action="cancel" class="btn btn-danger">Cancelar</button>
			<button class="btn btn-submit" type="submit"><i class="fa fa-search"></i> Buscar</button>
		</div>
		
	</form>
</div>



