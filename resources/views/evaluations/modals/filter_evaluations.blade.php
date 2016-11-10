<div class="remodal" data-remodal-id="filter-evaluations" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div class="text-left">
    <p style="font-size: 18px"><strong>Filtros de búsqueda</strong></p>
    <p style="font-size: 16px">Seleccione uno o más filtros:</p>
  </div>
  <form method="GET" action="{{$route}}">
    <div class="flex-container is-wrap has-space-between">            
            <div class="flex-element input-container">
                <label class="label-input label-modal">Nombre</label>
                <input class="input-filter input-modal" type="text" name="nombre" placeholder="Escriba el nombre de la evaluación" maxlength="30">                
            </div>            
            <div class="flex-element input-container has-select">
                <label class="label-input label-modal">Estado</label>
                <select class="form-control input-filter" name="estado">
                	<option value="">Todas</option>					
                	<option value="2">Activa</option>					
                	<option value="3">Inactiva</option>					
                	<option value="1">Registrada</option>					
                	<option value="0">Cancelada</option>
                </select>
            </div>
    </div>
    <div class="flex-container has-flex-end" style="margin-top: 15px">
          <button data-remodal-action="cancel" class="btn btn-danger">Cancelar</button>
          <button class="btn btn-submit" type="submit"><i class="fa fa-search"></i> Buscar</button>
    </div>
  </form>
</div>