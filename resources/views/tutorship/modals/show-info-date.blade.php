<div class="remodal" data-remodal-id="{{$id}}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div class="text-left">
    <p style="font-size: 18px"><strong>Ver cita</strong></p>
    <p style="font-size: 16px"></p>
  </div>
  <form class="form-horizontal">
		<div class="form-group">
			<label class="show control-label col-md-4 col-sm-4 col-xs-12">Tutor</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input class="input-filter input-modal" type="text" disabled value="{{ $cita->teacher->Nombre }} {{ $cita->teacher->ApellidoPaterno }}" style="color: #8487ae;">
			</div>			
		</div>
		<div class="form-group">
			<label class="show control-label col-md-4 col-sm-4 col-xs-12">Estado</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input class="input-filter input-modal" type="text" disabled value="{{ $status}}" style="color: #8487ae;">
			</div>			
		</div>
		<div class="form-group">
			<label class="show control-label col-md-4 col-sm-4 col-xs-12">Fecha</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input class="input-filter input-modal" type="text" disabled value="{{ $date}}" style="color: #8487ae;">
			</div>			
		</div>
		<div class="form-group">
			<label class="show control-label col-md-4 col-sm-4 col-xs-12">Hora</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input class="input-filter input-modal" type="text" disabled value="{{ $hour }}" style="color: #8487ae;">
			</div>			
		</div>
		<div class="form-group">
			<label class="show control-label col-md-4 col-sm-4 col-xs-12">Lugar</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input class="input-filter input-modal" type="text" disabled value="{{ $cita->teacher->oficina}}" style="color: #8487ae;">
			</div>			
		</div>
		<div class="form-group">
			<label class="show control-label col-md-4 col-sm-4 col-xs-12">Tema</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input class="input-filter input-modal" type="text" disabled value="{{ $cita->topic->nombre }}" style="color: #8487ae;">
			</div>			
		</div>
		<div class="form-group">
			<div class="col-xs-12 text-right">
				<button data-remodal-action="cancel" class="btn btn-success" type="submit">Aceptar</button>
			</div>
		</div>
	</form>
</div>



