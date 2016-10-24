<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true"  id="modal-buscar-profesor">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Buscar Profesor</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" id="form-search-teacher" action="{{ url('teachers/searchEvaluacion') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-4">Nombre/Ap. paterno/Ap. materno:</label>
                        <div class="col-md-6 col-sm-6 col-xs-8">
                            <input class="form-control" type="text" name="nombre">
                        </div>                                                           
                    </div>                        
                    <div class="form-group">
                        <center>
                            <a class="btn btn-success" id="search-teacher"><i class="fa fa-search"></i> Buscar</a>
                        </center> 
                    </div>
                </form>
                
                <div class="row" ">  
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive" id="table-teacher">
                        <!-- aca se metera la tabla -->
                        </div>                
                    </div>              
                    
                </div>
            </div>
        </div>
    </div>
</div>