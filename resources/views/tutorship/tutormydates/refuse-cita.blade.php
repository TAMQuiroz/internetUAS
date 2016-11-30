<div class="remodal" data-remodal-id="{{$id}}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
    <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
    <div class="text-left" style="margin-bottom:20px;">
        <p style="font-size: 18px"><strong>Rechazar cita</strong></p>
        <p style="font-size: 16px">Esta a punto de rechazar esta cita, indique el motivo</p>
    </div>
    <form class="form-horizontal" method="POST" action="{{$route}}">
        <input type="hidden" name="id" value="{{ $cita->id }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <label class="show control-label col-md-4 col-sm-4 col-xs-12">Motivo</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="motivo" style="margin-bottom: 20px;">
                <option value>Seleccione Motivo</option>
                @foreach ($motivos as $motivo)
                      <option value="{{$motivo->id}}">{{$motivo->nombre}}</option>
                @endforeach
            </select>
        </div>
      </div>
      <div class="form-group">
        <label class="show control-label col-md-4 col-sm-4 col-xs-12">Observaciones</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea class="form-control" name="observations" rows="4" style="margin-bottom: 30px;"></textarea>
        </div>
      </div>
        <div class="form-group">
            <button data-remodal-action="cancel" class="btn btn-danger">Cancelar</button>
            <button class="btn btn-success" type="submit">Aceptar</button>
        </div>
    </form>
</div>

