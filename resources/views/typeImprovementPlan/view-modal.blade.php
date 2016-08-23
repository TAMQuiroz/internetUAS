<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal-typeImprovementPlan">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Ver Tipo Plan de Mejora</h4>
                      </div>

                      <div class="modal-body">

                          <div class="row" style="margin-top: 10px;">
                      		  <div class="form-group">
                      		  <div class="col-md-3 col-sm-3"></div>
                        	 <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Código:</label>
                        	 <div class="col-md-3 col-sm-3 col-xs-12" id="typeCode">
                        	 </div>
                      		  </div>
                    	   </div>

                         <div class="row" style="margin-top: 10px;">
                            <div class="form-group">
                            <div class="col-md-3 col-sm-3"></div>
                           <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Tema Relacionado:</label>
                           <div class="col-md-3 col-sm-3 col-xs-12" id="typeTheme">
                           </div>
                            </div>
                         </div>

                         <div class="row" style="margin-top: 10px;">
                            <div class="form-group">
                            <div class="col-md-3 col-sm-3"></div>
                           <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Descripción:</label>
                           <div class="col-md-3 col-sm-3 col-xs-12" id="typeDescription">
                           </div>
                            </div>
                         </div>

                         <div class="row" style="margin-top: 10px;">
                              <div class="form-group">
                              <div class="col-md-3 col-sm-3"></div>
                              <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Fecha Registro:</label>
                              <div class="col-md-3 col-sm-3 col-xs-12" id="dateR">
                              </div>
                              </div>
                         </div>

                         <div class="row" style="margin-top: 10px;">
                              <div class="form-group">
                              <div class="col-md-3 col-sm-3"></div>
                              <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Última Fecha Modificación:</label>
                              <div class="col-md-3 col-sm-3 col-xs-12" id="dateL">
                              </div>
                              </div>
                         </div>

                      </div>
                      <div class="modal-footer">
                      @if(in_array(51,Session::get('actions')))
                        <a class="btn btn-success pull-right" id="edit-button"> Editar</a>
                      @endif
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      </div>

                    </div>
                  </div>
                </div>