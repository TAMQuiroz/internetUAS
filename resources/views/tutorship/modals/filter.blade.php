<div class="remodal" data-remodal-id="filter-tutors" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div class="text-left">
    <p style="font-size: 18px"><strong>Filtros de búsqueda</strong></p>
    <p style="font-size: 16px">Selecciones uno o más filtros:</p>
  </div>
  <form method="GET" action="{{route('tutor.index')}}">
  	<div class="flex-container is-wrap has-space-between">
			<div class="flex-element input-container">
				<label class="label-input">Nombre</label>
				<input type="text" name="name">
			</div>
			<div class="flex-element input-container">
				<label class="label-input">Apellido Materno</label>
				<input type="text" name="secondLastName">
			</div>
			<div class="flex-element input-container">
				<label class="label-input">Apellido Paterno</label>
				<input type="text" name="lastName">
			</div>
  	</div>
  	<div class="flex-container has-flex-end" style="margin-top: 15px">
		  <button data-remodal-action="cancel" class="btn btn-danger">Cancel</button>
		  <button class="btn btn-submit" type="submit">OK</button>
  	</div>
  </form>
</div>