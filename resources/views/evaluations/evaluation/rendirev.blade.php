@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<div class="title_left">
				<h3>{{$evaluation->nombre}}</h3>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-body">
			{{Form::open(['route' => 'evaluacion_alumno.store', 'class'=>'form-horizontal', 'id'=>'respuestas'])}}
				
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
							@foreach($pregunta->alternativas as $key => $alternativa)
							<li>
								<p>
									<input name="arrQuestion[{{$pregunta->id}}]" value="{{$alternativa->letra}}" type="radio" id="clave_{{$pregunta->id}}_{{$alternativa->letra}}" />
									<label for="clave_{{$pregunta->id}}_{{$alternativa->letra}}"><strong>{{$alternativa->letra}}.</strong> {{$alternativa->descripcion}}</label>
								</p>															
							</li>
							@endforeach
						</ul>
					</div><br>
					@elseif($pregunta->tipo == 3)
					<div class="form-group">
						<h4>Pregunta {{$key+1}}: ({{$pregunta->puntaje}} puntos)</h4>
						<p>{{$pregunta->descripcion}}</p>
						<h5>Respuesta:</h5>	
						<div class="file-field input-field">
							<div class="btn">
							<span>Archivo</span>
								<input type="file">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
							</div>
						</div>					
						<div class="col-md-4">							
							<p>Tamaño máximo: {{$pregunta->tamano_arch}} MB</p>
							<p>Extensión del archivo: {{$pregunta->extension_arch}}</p>
						</div>
					</div><br>
					@endif
					@endforeach
					

					<div class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<center>
								<a class="btn btn-success" data-toggle="modal" data-target="#modal-enviar-respuestas">Terminar y enviar respuestas <i class="fa fa-paper-plane" aria-hidden="true"></i></a>					
							</center>												
						</div>
					</div>					
				{{Form::close()}}
			</div>				
		</div>
	</div>
</div>

<div id="modal-enviar-respuestas" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirmación</h4>
            </div>
            <div class="modal-body">
                <p>A continuación, se enviarán sus respuestas ingresadas y dará por terminada la evaluación. ¿Está seguro que desea continuar?</p>
            </div>
            <div class="modal-footer">
                {{ Form::button('Cancelar', ['class' => 'btn btn-danger', 'data-dismiss' => 'modal'])}}
                <input class="btn btn-success" value="Continuar" type="submit" form="respuestas" />
            </div>
        </div>
    </div>
</div>
@endsection