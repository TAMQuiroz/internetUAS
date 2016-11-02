@extends('app')
@section('content')
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
			{{Form::open(['route' => ['evaluacion_corregida.store',$evaluation->id,$tutstudent],'files'=>true, 'class'=>'form-horizontal', 'id'=>'respuestas'])}}
					@foreach($evs as $key => $ev)					
					<div class="form-group">
						<h4>Pregunta {{$key+1}}: ({{$ev->pregunta->puntaje}} puntos)</h4>
						<p>{{$ev->pregunta->descripcion}}</p>
						<h5>Respuesta:</h5>
						@if($ev->pregunta->tipo == 2)
						<p>{{$ev->respuesta}}</p>
						@elseif($ev->pregunta->tipo == 3)
						<a style="text-decoration: underline" href="{{route('evaluacion.descargar_respuesta',$ev->id)}}">Descargar archivo</a>@endif	
						<textarea placeholder="Escriba un comentario de la corrección" class="form-control" name="arr_comentario[{{$ev->id}}]" rows="4" maxlength="5000"></textarea>
						<div class="input-group">
							<span class="input-group-addon">Puntaje</span>
							<input type="text" class="form-control" onkeypress="return validateFloatKeyPress(this,event);" maxlength="6" name="arr_puntaje[{{$ev->id}}]">							
						</div>
					</div><br>
					@endforeach					

					<div class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<center>
								<a id="terminar" class="btn btn-success" data-toggle="modal" data-target="#modal-enviar-respuestas">Terminar corrección <i class="fa fa-paper-plane" aria-hidden="true"></i></a>	
								<h6 hidden id="mensaje-size">Algunos archivos son muy grandes.</h6>				
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
                <p id="terminar">A continuación, se enviarán sus correcciones ingresadas y dará por terminada la corrección de las preguntas de esta evaluación. ¿Está seguro que desea continuar?</p>
            </div>
            <div class="modal-footer">
                {{ Form::button('Cancelar', ['class' => 'btn btn-danger', 'data-dismiss' => 'modal'])}}
                <input id="enviar" class="btn btn-success" value="Continuar" type="submit" form="respuestas" />
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	
	function validateFloatKeyPress(el, evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode;
		var number = el.value.split('.');
		if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
			return false;
		}
    //just one dot (thanks ddlab)
    if(number.length>1 && charCode == 46){
    	return false;
    }
    //get the carat position
    var caratPos = getSelectionStart(el);
    var dotPos = el.value.indexOf(".");
    if( caratPos > dotPos && dotPos>-1 && (number[1].length > 1)){
    	return false;
    }
    return true;
}

//thanks: http://javascript.nwbox.com/cursor_position/
function getSelectionStart(o) {
	if (o.createTextRange) {
		var r = document.selection.createRange().duplicate()
		r.moveEnd('character', o.value.length)
		if (r.text == '') return o.value.length
			return o.value.lastIndexOf(r.text)
	} else return o.selectionStart
}

</script>
@endsection

