<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal-improvementPlan">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Ver Plan de Mejora</h4>
                      </div>

                      <div class="modal-body">

                          <div class="row" style="margin-top: 10px;">
                              <div class="form-group">
                                <div class="col-md-3 col-sm-3"></div>
                                   <label for="middle-name" class="control-label col-md-6 col-sm-6 col-xs-12"><h4 class="modal-title" id="myModalLabel"><strong>Información Tipo Plan Mejora</strong></h4></label>
                                <div class="col-md-3 col-sm-3 col-xs-12" id="sug"></div>
                              </div>
                          </div>

                          <div class="row" style="margin-top: 10px;">
                      		  <div class="form-group">
                      		  <div class="col-md-3 col-sm-3"></div>
                        	 <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Identificador:</label>
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
                                   <label for="middle-name" class="control-label col-md-6 col-sm-6 col-xs-12"><h4 class="modal-title" id="myModalLabel"><strong>Información Plan Mejora</strong></h4></label>
                                <div class="col-md-3 col-sm-3 col-xs-12" id="sug"></div>
                              </div>
                          </div>

                          <div class="row" style="margin-top: 10px;">
                              <div class="form-group">
                              <div class="col-md-3 col-sm-3"></div>
                              <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Hallazgo:</label>
                              <div class="col-md-3 col-sm-3 col-xs-12" id="find">
                              </div>
                              </div>
                         </div>
                          <div class="row" style="margin-top: 10px;">
                          		<div class="form-group">
                          		<div class="col-md-3 col-sm-3"></div>
                            	<label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Análisis Causal:</label>
                            	<div class="col-md-3 col-sm-3 col-xs-12" id="analysis">
                            	</div>
                          		</div>
                          </div>

                         <div class="row" style="margin-top: 10px;">
                              <div class="form-group">
                              <div class="col-md-3 col-sm-3"></div>
                              <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Responsable:</label>
                              <div class="col-md-3 col-sm-3 col-xs-12" id="owner">
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
                              <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Fecha Implentación Programada:</label>
                              <div class="col-md-3 col-sm-3 col-xs-12" id="dateI">
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

                         <div class="row" style="margin-top: 10px;">
                              <div class="form-group">
                              <div class="col-md-3 col-sm-3"></div>
                              <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Estado:</label>
                              <div class="col-md-3 col-sm-3 col-xs-12" id="state">
                              </div>
                              </div>
                         </div>

                      </div>
                      <div class="modal-footer">
                      @if(in_array(46,Session::get('actions')) && !is_null(Session::get('user')->IdDocente))
                        <a class="btn btn-success pull-right" id="edit-button"> Editar</a>
                      @endif
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      </div>

                    </div>
                  </div>
                </div>