<div class="remodal" data-remodal-id="{{$id}}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  	<button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  	<div class="text-left">
    	<p style="font-size: 18px"><strong>Confirmar cita</strong></p>
    	<p style="font-size: 16px">{{$message}}</p>
  	</div>
  	<form class="form-horizontal" method="POST" action="{{$route}}">
  		<input type="hidden" name="id" value="{{ $cita->id }}">
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group" style="margin-top:20px;">
			<button data-remodal-action="cancel" class="btn btn-danger">Cancelar</button>
			<button class="btn btn-success" type="submit">Aceptar</button>
		</div>
	</form>
</div>



