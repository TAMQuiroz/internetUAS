<div class="remodal" data-remodal-id="filter-questions" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
	<button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
	<div class="text-left">
		<p style="font-size: 18px"><strong>Filtros de búsqueda</strong></p>
		<p style="font-size: 16px">Seleccione uno o más filtros:</p>
	</div>
	<form method="GET" action="{{$route}}" class="form-horizontal" >		
		<div class="form-group">
			{{Form::label('Tipo:',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-6'])}}
			<div class="col-md-6 col-sm-6 col-xs-6">
				<select name="tipo" class="form-control">
					<option value="">Seleccione</option>
					<option value="1">Cerrada</option>
					<option value="2">Abierta</option>
					<option value="3">Archivo</option>                         
				</select>                       
			</div>			                                                      
		</div>  
		<div class="form-group">
			{{Form::label('Dificultad:',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-6'])}}
			<div class="col-md-6 col-sm-6 col-xs-6">
				<select name="dificultad" class="form-control">
					<option value="">Seleccione</option>
					<option value="1">Baja</option>
					<option value="2">Media</option>
					<option value="3">Alta</option>                         
				</select>                       
			</div>   
		</div>
		<div class="form-group">
			{{Form::label('Competencia:',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-6'])}}
			<div class="col-md-6 col-sm-6 col-xs-6">
				<select name="competencia" class="form-control">
					<option value="">Seleccione</option>
					@foreach($competences as $competence)
					<option value="{{$competence->id}}" >{{$competence->nombre}}</option>
					@endforeach 
				</select>                       
			</div>   			                                                      
		</div> 		
		<div class="form-group">
			<button data-remodal-action="cancel" class="btn btn-danger">Cancelar</button>
			<button class="btn btn-submit" type="submit"><i class="fa fa-search"></i> Buscar</button>
		</div>		
	</form>
</div>



