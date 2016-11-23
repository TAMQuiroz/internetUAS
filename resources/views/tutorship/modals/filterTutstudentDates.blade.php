<div class="remodal" data-remodal-id="filter-tutorDates" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div class="text-left">
    <p style="font-size: 18px"><strong>Filtros de búsqueda</strong></p>
    <p style="font-size: 16px">Seleccione uno o más filtros:</p>
</div>
<form method="GET" action="{{$route}}">
    <div class="flex-container is-wrap has-space-between">                        
        <div class="flex-element input-container">                        
            <label class="label-input label-modal">Fecha inicio</label>
            <div class="input-group date" id="tut-date-begin">
                <input type="text" class="form-control input-modal" name="beginDate" placeholder="dd/mm/aaaa"/>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>                      
        </div>
        <div class="flex-element input-container">                        
            <label class="label-input label-modal">Fecha fin</label>
            <div class="input-group date" id="tut-date-end">
                <input type="text" class="form-control input-modal" name="endDate" placeholder="dd/mm/aaaa"/>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>                      
        </div>
        <div class="flex-element input-container has-select">
            <label class="label-input label-modal">Estado de la cita</label>
            <select class="form-control input-filter" name="state">
                <option value="">Todas</option>                 
                <option value="1">Pendiente</option>                   
                <option value="2">Confirmada</option>                 
                <option value="3">Cancelada</option>                   
                <option value="4">Sugerida</option>
                <option value="5">Rechazada</option>
                <option value="6">Asistida</option>
                <option value="7">No asistida</option>
            </select>
        </div>
    </div>
    <div class="flex-container has-flex-end" style="margin-top: 15px">
      <button data-remodal-action="cancel" class="btn btn-danger">Cancelar</button>
      <button class="btn btn-submit" type="submit"><i class="fa fa-search"></i> Buscar</button>
  </div>
</form>
</div>
<script src="{{ URL::asset('js/tutorship/tutstudentDates.js')}}"></script>