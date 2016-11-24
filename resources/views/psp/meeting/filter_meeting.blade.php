<div class="remodal" data-remodal-id="filter" role="dialog">
  	<button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  	<div class="text-left">
    	<p><strong>Filtros de búsqueda</strong></p>
  	</div>

  	{{Form::open(['route' => $route, 'method' => 'GET', 'class' => 'form-horizontal'])}}
		<div class="form-group">
			<label class="control-label col-md-4 col-sm-4 col-xs-6 label-modal">Nombre</label>
			<div class="col-md-6 col-sm-6 col-xs-6">
				{{Form::text('nombre', null, ['class' => 'form-control input-modal', 'maxlength' => 30])}}
			</div>			
		</div>
		<div class="form-group">
			<label class="control-label col-md-4 col-sm-4 col-xs-6 label-modal">Apellido Paterno</label>
			<div class="col-md-6 col-sm-6 col-xs-6">
				{{Form::text('apellidoPat', null, ['class' => 'form-control input-modal', 'maxlength' => 30])}}
			</div>			
		</div>
		
		<div class="form-group">
			<label class="control-label col-md-4 col-sm-4 col-xs-6 label-modal">Fecha Inicio</label>           
            <div class="col-md-6 col-sm-6 col-xs-6">
                <input class="form-control" type="text" name="fechaInicio" id="fechaInicio" placeholder="dd-mm-aaaa" minlength="10" maxlength="10" value=""/>
            </div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-4 col-sm-4 col-xs-6 label-modal">Fecha Fin</label>            
            <div class="col-md-6 col-sm-6 col-xs-6">
                <input class="form-control" type="text" name="fechaFin" id="fechaFin" placeholder="dd-mm-aaaa" minlength="10" maxlength="10" value=""/>
            </div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-4 col-sm-4 col-xs-6 label-modal">Estado</label>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<select class="form-control input-filter" name="estado">
                <option value="">Todas</option>                 
                <option value="Pendiente">Pendiente</option>                   
                <option value="Realizada">Realizada</option>                 
                <option value="Cancelada">Cancelada</option>
            </select>
			</div>			
		</div>
	
		<div class="form-group">
			<button class="btn btn-danger" data-remodal-action="cancel" >Cancelar</button>
			<button class="btn btn-submit" type="submit"><i class="fa fa-search"></i> Buscar</button>
		</div>
	{{Form::close()}}
</div>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script>
        $(function () {
            
            $("#fechaInicio").datepicker({
                format: "dd-mm-yyyy",                                                                                
                language: "es",                
                todayHighlight: true,
            });
            $("#fechaFin").datepicker({
                format: "dd-mm-yyyy", 
                language: "es",                
                todayHighlight: true,
            });
        });
    </script>