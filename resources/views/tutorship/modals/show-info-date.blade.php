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
		@if ($cita->estado == 3 || $cita->estado == 5)
		<div class="form-group text-left">
			<p class="col-md-12 col-sm-12 col-xs-12" style="font-size: 16px">
				Sobre motivos de cancelación
			</p>
		</div>
		<div class="form-group">
			<label class="show control-label col-md-4 col-sm-4 col-xs-12">Motivo</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input class="input-filter input-modal" type="text" disabled value="{{ $cita->reason->nombre }}" style="color: #8487ae;">
			</div>			
		</div>
		<div class="form-group">
			<label class="show control-label col-md-4 col-sm-4 col-xs-12">Observaciones</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<textarea class="input-filter" disabled style="color: #8487ae; height: 80px;">{{ $cita->adicional }}</textarea>
			</div>			
		</div>
		@endif
		@if ($cita->estado == 6)
		<div class="form-group text-left">
			<p class="col-md-12 col-sm-12 col-xs-12" style="font-size: 16px">
				Sobre atención de cita
			</p>
		</div>
		<div class="form-group">
			<label class="show control-label col-md-4 col-sm-4 col-xs-12">Observaciones</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<textarea class="input-filter" disabled style="color: #8487ae; height: 80px;">{{ $cita->observacion }}</textarea>
			</div>			
		</div>
		@endif
		<div class="form-group">
			<div class="col-xs-12 text-right" style="margin-top: 20px;">
				<button data-remodal-action="cancel" class="btn btn-success" type="submit">Aceptar</button>
			</div>
		</div>
	</form>
</div>



