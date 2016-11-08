<div class="remodal" id="modal-buscar-banco-preguntass" data-remodal-id="modal-buscar-banco-preguntas" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div class="text-left">
    <p style="font-size: 18px"><strong>Filtros de búsqueda</strong></p>
    <p style="font-size: 16px">Seleccione uno o más filtros:</p>
  </div>
  <form method="POST" id="form-search-question" action="{{ route('pregunta.buscar') }}">
  {{ csrf_field() }} 
    <div class="flex-container is-wrap has-space-between">                                  
            <div class="flex-element input-container has-select">
                <label class="label-input label-modal">Tipo</label>
                <select class="form-control input-filter" name="tipo" required>
                    <option value="">Todos</option>
                    <option value="1">Cerrada</option>
                    <option value="2">Abierta</option>
                    <option value="3">Archivo</option>  
                </select>
            </div>
            <div class="flex-element input-container has-select">
                <label class="label-input label-modal">Dificultad</label>
                <select class="form-control input-filter" name="dificultad" required>
                    <option value="">Todas</option>
                    <option value="1">Baja</option>
                    <option value="2">Media</option>
                    <option value="3">Alta</option>
                </select>
            </div>
            <div class="flex-element input-container has-select">
                <label class="label-input label-modal">Competencia</label>
                <select class="form-control input-filter" name="competencia" required>
                    <option value="">Todas</option>
                    @foreach($competences as $competence)
                    <option value="{{$competence->id}}" >{{$competence->nombre}}</option>
                    @endforeach
                </select>
            </div>
    </div>
    <div class="flex-container has-flex-end" style="margin-top: 15px">
          <button data-remodal-action="cancel" class="btn btn-danger">Cancelar</button>
          <a class="btn btn-success" id="search-question" ><i class="fa fa-search"></i> Buscar</a>
    </div>
  </form>

    
    <div class="text-left">
        <p style="font-size: 18px"><strong>Resultados</strong></p>   
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive" id="table-question">
                <!-- aca se metera la tabla -->
            </div> 
        </div>         
      </div>
</div>

