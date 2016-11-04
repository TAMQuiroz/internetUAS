<div class="modal fade" tabindex="-1" role="dialog"  id="modal-buscar-banco-preguntas">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Buscar preguntas</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" id="form-search-question" action="{{ route('pregunta.buscar') }}">
                    {{ csrf_field() }}                    
                    <div class="form-group">
                        {{Form::label('Tipo:',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-6'])}}
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <select name="tipo" class="form-control" required="required">
                                <option value="">Todos</option>
                                <option value="1">Cerrada</option>
                                <option value="2">Abierta</option>
                                <option value="3">Archivo</option>                         
                            </select>                       
                        </div> 
                        {{Form::label('Dificultad:',null,['class'=>'control-label col-md-2 col-sm-1 col-xs-6'])}}
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <select name="dificultad" class="form-control" required="required">
                                <option value="">Todas</option>
                                <option value="1">Baja</option>
                                <option value="2">Media</option>
                                <option value="3">Alta</option>                         
                            </select>                       
                        </div>                                                         
                    </div>                                         
                    <div class="form-group">
                        {{Form::label('Competencia:',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-6'])}}
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <select name="competencia" required="required" class="form-control">
                                <option value="">Todas</option>
                                @foreach($competences as $competence)
                                <option value="{{$competence->id}}" >{{$competence->nombre}}</option>
                                @endforeach 
                            </select>                       
                        </div>   
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <center>
                                <a class="btn btn-success" id="search-question"><i class="fa fa-search"></i> Buscar</a>
                            </center>
                            
                        </div>                                                       
                    </div> 
                </form>
                
                <div class="row" ">  
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h4>Resultados</h4>                        
                        <div class="table-responsive" id="table-question">
                            <!-- aca se metera la tabla -->
                        </div>               
                    </div>              
                    
                </div>
            </div>
        </div>
    </div>
</div>