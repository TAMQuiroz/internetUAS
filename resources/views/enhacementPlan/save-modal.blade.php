<div class="modal fade" role="dialog" id="cicleModal">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nuevo ciclo</h4>
                      </div>

                      <form class="form-horizontal" role="form" action="{{ route('saveModalNew.enhacementPlan')}}" method="POST" id="formAcademic1" name="formAcademic1">
                      <div class="modal-body">

                        
                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-horizontal">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="text" id="validarCycle" name="validarCycle" hidden>
                                  <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Año Ciclo <span class="error">* </span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                          <select class="form-control colo-md-7 col-xs-12 anio"  name="anio" id="anio" required="true">
                                                <option value="0">--Seleccione--</option>
                                            <?php
                                              for($anio=(date("Y")); $anio<=(date("Y")+10); $anio++) 
                                              {
                                                echo "<option value=".$anio.">".$anio."</option>";
                                              }
                                            ?>
                                          </select> 
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Número Ciclo <span class="error">* </span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select class="form-control col-md-7 col-xs-12 numberC"  name="numberC" id="numberC" required="true">
                                        <option value="3">--Seleccione--</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                      </select> 
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                      <button class="btn btn-success submit pull-right" type="submit">Guardar</button>
                                      <a class="btn btn-default submit" href="{{ route('new.enhacementPlan') }}">Cancel</a>
                                    </div>
                                  </div>

                                </div>
                          </div>
                        </div>
                        
                      </div>
                      </form>
                      <div class="modal-footer">
                          
                      </div>
                      
                    </div>
                  </div>
                </div>