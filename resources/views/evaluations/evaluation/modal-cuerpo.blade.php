<form class="form-horizontal" method="POST" id="form-edit-question" action="{{ route('pregunta.editar') }}">
    {{ csrf_field() }}                    
    <div class="form-group">
        {{Form::label('Evaluador:',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-6'])}}
        <div class="col-md-4 col-sm-4 col-xs-6">
            <select name="tipo" class="form-control" required="required">
                <option value="">Seleccione</option>
                @foreach($evaluators as $evaluator)
                <option value="{{$evaluator->IdDocente}}">{{$evaluator->ApellidoPaterno.' '.$evaluator->ApellidoMaterno.', '.$evaluator->Nombre}}</option>
                @endforeach                      
            </select>                       
        </div>                                                                               
    </div>                                         
    <div class="form-group">
        {{Form::label('Puntaje:',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-6'])}}
        <div class="col-md-4 col-sm-4 col-xs-6">
            <input type="number" name="" value="33"> 
        </div>   
        <div class="col-md-6 col-sm-6 col-xs-12">
            <center>
                <a class="btn btn-success" id="search-question"><i class="fa fa-search"></i> Aceptar</a>
            </center>
            
        </div>                                                       
    </div> 
</form>