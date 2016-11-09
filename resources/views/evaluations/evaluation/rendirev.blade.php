@extends('app')
@section('content')
<style>
	#contador{
		font-size:  30px;
		color:blue;
		text-align: right;
		font-weight: bold;
		font-family: "Times New Roman", Times, serif;;
	}
	#h{
		font-size:  30px;
		color:blue;		
		font-weight: bold;
		font-family: "Times New Roman", Times, serif;;
	}
	#mensaje-size{
		color: red;
		font-weight: bold;
	}
	#contador_tiempo {
		position: fixed;		
		bottom:0px;
		right:0px;
				
	}
</style>
<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<div class="title_left">
				<h3>{{$evaluation->nombre}}</h3>							
				<input hidden type="number" id="minutos" value="{{$evaluation->tiempo}}">				
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-body">
			<div id="contador_tiempo">
				<h5 style="display: inline-block;" id="h">Tiempo restante:</h5>
				<div style="display: inline-block;" id="contador"></div>
			</div>
			
			{{Form::open(['route' => 'evaluacion_alumno.store','files'=>true, 'class'=>'form-horizontal', 'id'=>'respuestas'])}}
				<input hidden type="number" name="id_evaluation" value="{{$evaluation->id}}">
				
					@foreach($evaluation->preguntas as $key => $pregunta)
					@if($pregunta->tipo == 2)
					<div class="form-group">
						<h4>Pregunta {{$key+1}}: ({{$pregunta->puntaje}} puntos)</h4>
						<p>{{$pregunta->descripcion}}</p>
						<h5>Respuesta:</h5>
						<textarea class="form-control" name="arrQuestion[{{$pregunta->id}}]" rows="4" maxlength="5000"></textarea>						
					</div><br>
					@elseif($pregunta->tipo == 1)
					<div class="form-group">
						<h4>Pregunta {{$key+1}}: ({{$pregunta->puntaje}} puntos)</h4>
						<p>{{$pregunta->descripcion}}</p>
						<h5>Respuesta:</h5>
						<ul>
							<li hidden>
								<p>
									<input checked name="arrQuestion[{{$pregunta->id}}]" value="0" type="radio" />		
								</p>															
							</li>
							@foreach($pregunta->alternativas as $key => $alternativa)
							<li>
								<div class="radio">
								<label><input name="arrQuestion[{{$pregunta->id}}]" value="{{$alternativa->letra}}" type="radio" id="clave_{{$pregunta->id}}_{{$alternativa->letra}}" /> {{$alternativa->letra}}. {{$alternativa->descripcion}} </label>
								</div>
																						
							</li>
							@endforeach
						</ul>
					</div><br>
					@elseif($pregunta->tipo == 3)
					<div class="form-group">
						<h4>Pregunta {{$key+1}}: ({{$pregunta->puntaje}} puntos)</h4>
						<p>{{$pregunta->descripcion}}</p>
						<h5>Respuesta:</h5>	
						<div class="col-md-2 col-xs-4">							
							<p>Tamaño máximo: {{$pregunta->tamano_arch}} MB</p>
							<p>Extensión del archivo: {{$pregunta->extension_arch}}</p>
						</div>	
						<div class="file-field input-field">
							<div class="btn">
								<span>Archivo</span>
								{{Form::file($pregunta->id, ['id'=>'file','class'=>'file form-control', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Solo ingresar archivo con formato .'.$pregunta->extension_arch, 'accept'=>'.'.$pregunta->extension_arch])}}
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" name="arrQuestion[{{$pregunta->id}}]" type="text">
							</div>
						</div>
					</div><br>
					@endif
					@endforeach
					

					<div class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<center>
								<a id="terminar" class="btn btn-success" href="#modal-enviar-respuestas">Terminar y enviar respuestas <i class="fa fa-paper-plane" aria-hidden="true"></i></a>	
								<h6 hidden id="mensaje-size">Algunos archivos son muy grandes.</h6>				
							</center>												
						</div>
					</div>					
				{{Form::close()}}
			</div>				
		</div>
	</div>
</div>

<div id="modal-enviar-respuestas" class="remodal" data-remodal-id="modal-enviar-respuestas" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div class="text-left">
    <p style="font-size: 18px"><strong>Confirmación</strong></p>
  </div>
  <p id="terminar">A continuación, se enviarán sus respuestas ingresadas y dará por terminada la evaluación.<br/> ¿Está seguro que desea continuar?</p>
    <div class="flex-container has-flex-end" style="margin-top: 15px">
          <button data-remodal-action="cancel" class="btn btn-danger">Cancelar</button>
          <input id="enviar" class="btn btn-success" value="Continuar" type="submit" form="respuestas" />
    </div>
</div>

<!-- <div id="modal-enviar-respuestas" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirmación</h4>
            </div>
            <div class="modal-body">
                <p id="terminar">A continuación, se enviarán sus respuestas ingresadas y dará por terminada la evaluación. ¿Está seguro que desea continuar?</p>
            </div>
            <div class="modal-footer">
                {{ Form::button('Cancelar', ['class' => 'btn btn-danger', 'data-dismiss' => 'modal'])}}
                <input id="enviar" class="btn btn-success" value="Continuar" type="submit" form="respuestas" />
            </div>
        </div>
    </div>
</div>
 -->

<script type="text/javascript" src="{{ asset('js/jquery.countdown.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/dateformat.js')}}"></script>
<script type="text/javascript">

	// countdown
	var minutes = $("#minutos").val();	
	var later = new Date(new Date().getTime() + 1000*60*minutes).format("yyyy/m/dd HH:MM:ss");
	
	

	$('#contador').countdown(later)
	.on('update.countdown', function(event) {
		var format = '%H:%M:%S';
		$(this).html(event.strftime(format));
	})
	.on('finish.countdown', function(event) {

		$("#enviar").click();
	});

	//validar tamano del arhivo
	//binds to onchange event of your input field
	$('.file').bind('change', function() {

	  //this.files[0].size gets the size of your file.
	  if(this.files[0].size > 1048576*1 ){ //si es mayor a 1MB
	  	$("#terminar").attr("disabled","disabled");
	  	$("#mensaje-size").show();
	  }
	  else{
	  	$("#terminar").removeAttr("disabled");
	  	$("#mensaje-size").hide();
	  }
	  

	});

</script>


@endsection

