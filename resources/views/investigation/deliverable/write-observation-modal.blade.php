<div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true"  id="modal-write-observation" name="">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Observación del Documento</h4>
      </div>
      <div class="modal-body">
        <form action="{{ route('entregable.saveObservation')}}" method="POST" id="formObservation" name="formObservation" novalidate="true" class="form-horizontal">
        {{ csrf_field() }}
        <div class="hidden" style="margin-top: 10px;">
          <div class="form-group">
          <!--<div id="versionId" name="versionId" style="display: none;"></div>-->
          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Id:</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea class="resizable_textarea form-control" id="versionId" maxlength="200" name="versionId" style="width: 25vw; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 80px;"></textarea>
          </div>
          </div>
        </div>

        <div class="row" style="margin-top: 10px;">
      		<div class="form-group">
      		<!--<div id="versionId" name="versionId" style="display: none;"></div>-->
        	<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Observación:</label>
        	<div class="col-md-6 col-sm-6 col-xs-12">
            <textarea class="resizable_textarea form-control" id="versionObservation" maxlength="200" name="versionObservation" style="width: 25vw; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 80px;"></textarea>
          </div>
      		</div>
      	</div>
      </div>
      
      <div class="modal-footer">
        <button class="btn btn-success pull-right" type="submit"> Guardar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
      </form>
    </div>
  </div>
</div>