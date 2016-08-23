

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal-faculty">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>

                        <input type="hidden" name="faculty-id"/>
                        <h4 class="modal-title" id="myModalLabel">Ver Especialidad</h4>
                      </div>
                      <div class="modal-body">
                        <div class="row" style="margin-top: 10px;">
                      		<div class="form-group">
                      		<div class="col-md-3 col-sm-3"></div>
                        	<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código:</label>
                        	<div class="col-md-3 col-sm-3 col-xs-12" id="faculty-code">
                        	</div>
                      		</div>
                    	   </div>

                        	<div class="row" style="margin-top: 10px;">
                          		<div class="form-group">
                          		<div class="col-md-3 col-sm-3"></div>
                            	<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre:</label>
                            	<div class="col-md-3 col-sm-3 col-xs-12" id="faculty-name">
                            	</div>
                          		</div>
                        	</div>
                          <div class="row" style="margin-top: 10px;">
                              <div class="form-group">
                              <div class="col-md-3 col-sm-3"></div>
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Coordinador:</label>
                              <div class="col-md-3 col-sm-3 col-xs-12" id="faculty-coordinator">
                              </div>
                              </div>
                         </div>
                    	   <div class="row" style="margin-top: 10px;">
                        		  <div class="form-group">
                        		  <div class="col-md-3 col-sm-3"></div>
                          	  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción:</label>
                          	  <div class="col-md-3 col-sm-3 col-xs-12" id="faculty-desc">
                          	  </div>
                        		  </div>
                    	   </div>
                      </div>
                      <div class="modal-footer">
                      @if(in_array(71, Session::get('actions')))
                        <a class="btn btn-success pull-right" id="edit-button"> Editar</a>
                      @endif
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      </div>

                    </div>
                  </div>
                </div>