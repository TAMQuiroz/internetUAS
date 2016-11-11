@extends('app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Asignación de notas por criterio al alumno</h3>
            </div>
        </div>
    </div>
</div>        

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Criterios</h3>
            </div>
            <div class="panel-body">
            {{Form::open(['route' => ['aspecto.store',$idAlumno], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
                <div class="form-group">  
                <br>                  
                    @foreach($crit as $idcriterio => $nombre)
                    <div class="col-md-2"> 
                    </div>
                    <div class="col-md-6">
                    {{$nombre}}
                    </div>
                    <div class="col-md-1">                        
                        <select name="nota[{{$idcriterio}}]" class="form-control">
                            <?php for ($i=0; $i<=20; $i++) { 
                                if (encuentra($registroNotas, $i, $idcriterio)) {?>
                                    <option value="{{$i}}" selected>{{$i}}</option>
                                <?php } else {?>
                                    <option value="{{$i}}">{{$i}}</option>                            
                                <?php }?>                                      
                           <?php } ?>                            
                        </select>
                    </div>

                    <br><br><br><br><br>
                    @endforeach                    
                </div>

                

                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
                        <a class="btn btn-default pull-right" href="{{ route('student.index') }}">Cancelar</a>
                    </div>
                </div>
                {{Form::close()}}

            </div>
        </div>
    </div>
</div>
@endsection

<?php 

function encuentra($registroNotas, $i, $idcriterio)    {
      foreach ($registroNotas as $registro) {
          # code...
        if ($registro->idcriterio == $idcriterio && $registro->nota== $i){
            return true;
        }

      }
      return false;
}
?>