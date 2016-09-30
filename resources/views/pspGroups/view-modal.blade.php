<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ $title }}</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-2 col-sm-2"></div>
          <!--
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
              <img src="{{ URL::asset('images/user.png') }}" style="width: 200px;">
            </div>
          </div>
          -->
          <div class="col-md-7 col-sm-7 col-xs-12">
              <input type="number" name="teacherid" id="teacherid" hidden="true" value="">
              <div class="row" style="margin-top: 10px;">
                <div class="form-group">
                  <div class="col-md-2 col-sm-2"></div>
                  <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Código:</label>
                  <div class="col-md-6 col-sm-6 col-xs-12" id="teachercode"></div>
                </div>
              </div>
              
              <div class="row" style="margin-top: 10px;">
                <div class="form-group">
                  <div class="col-md-2 col-sm-2"></div>
                  <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Nombre:</label>
                  <div class="col-md-6 col-sm-6 col-xs-12" id="teachername"></div>
                </div>
              </div>

              <div class="row" style="margin-top: 10px;">
                <div class="form-group">
                  <div class="col-md-2 col-sm-2"></div>
                  <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Apellido Paterno:</label>
                  <div class="col-md-6 col-sm-6 col-xs-12" id="teacherlastname"></div>
                </div>
              </div>

              <div class="row" style="margin-top: 10px;">
                <div class="form-group">
                  <div class="col-md-2 col-sm-2"></div>
                  <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Apellido Materno:</label>
                  <div class="col-md-6 col-sm-6 col-xs-12" id="teachersecondlastname"></div>
                </div>
              </div>

              <div class="row" style="margin-top: 10px;">
                <div class="form-group">
                  <div class="col-md-2 col-sm-2"></div>
                  <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Correo:</label>
                  <div class="col-md-6 col-sm-6 col-xs-12" id="teacheremail"></div>
                </div>
              </div>

              <div class="row" style="margin-top: 10px;">
                <div class="form-group">
                  <div class="col-md-2 col-sm-2"></div>
                  <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Especialidad:</label>
                  <div class="col-md-6 col-sm-6 col-xs-12" id="teacherspecialty"></div>
                </div>
              </div>

              <div class="row" style="margin-top: 10px;">
                <div class="form-group">
                  <div class="col-md-2 col-sm-2"></div>
                  <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Categoría:</label>
                  <div class="col-md-6 col-sm-6 col-xs-12" id="teacherposition"></div>
                </div>
              </div>

              <div class="row" style="margin-top: 10px;">
                <div class="form-group">
                    <div class="col-md-2 col-sm-2"></div>
                    <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Estado:</label>
                    <div class="col-md-6 col-sm-6 col-xs-12" id="teacherstatus"></div>
                </div>
              </div>

              <div class="row" style="margin-top: 10px;">
                <div class="form-group">
                    <div class="col-md-2 col-sm-2"></div>
                    <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Descripción:</label>
                    <div class="col-md-6 col-sm-6 col-xs-12" id="teacherdescription"></div>
                </div>
              </div>

          </div>
          <!--
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="row" style="margin-top: 10px;">
                <div class="form-group">
                  <div class="col-md-1 col-sm-1"></div>
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción:</label>
                  <div class="col-md-7 col-sm-7 col-xs-12" id="teacherdescription" style="text-align: justify;"></div>
                </div>
              </div>
            </div>
          -->
        </div>
      </div>
                      
      <div class="modal-footer">

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
         @if(in_array(12, Session::get('actions')))
          <a class="btn btn-success pull-right" id="edit-button"> Editar</a>
          @endif
          <button type="button" class="btn btn-default pull-right" data-dismiss="modal"> Cancelar</button>
        </div>
      </div>
      <!--
        <div class="col-md-12 col-sm-12 col-xs-12">
          <button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar</button>
          <a class="btn btn-success" id="edit-button"> Editar</a>
        </div>
      -->
      </div>
    </div>
  </div>
</div>