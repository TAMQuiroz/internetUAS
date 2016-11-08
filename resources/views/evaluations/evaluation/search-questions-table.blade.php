@if(! $questions->isEmpty())
<table class="table table-striped responsive-utilities jambo_table bulk_action" name="table-objs">
    <thead>
        <tr class="headings">                
            <th class="centered column-title">Cód.</th>
            <th class="centered column-title">Tipo</th>
            <th class="centered column-title">Competencia</th>
            <th class="column-title">Pregunta</th>
            <th class="centered column-title">Tiempo</th>
            <th class="centered column-title">Dificultad</th>
            <th class="centered column-title">Seleccionar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($questions as $question)
        <tr id="question_{{$question->id}}">
            <td hidden><input type="number" value="{{$question->id}}" name="arrIds[{{$question->id}}]"></td>
            <td class="centered id">{{ $question->id }}</td>

            @if($question->tipo == 1)
            <td class="centered ">Cerrada</td>
            @elseif ($question->tipo == 2)
            <td class="centered ">Abierta</td>
            @else
            <td class="centered ">Archivo</td>
            @endif

            <td hidden ><input class="id_competence" type="number" value="{{$question->competencia->id}}"></td>
            <td class="centered " >{{ $question->competencia->nombre }}</td>

            <td>{{ $question->descripcion }}</td>

            <td class="centered tiempo">{{ $question->tiempo }}</td>            
            
            @if($question->dificultad == 1)
            <td class="centered ">Baja</td>
            @elseif ($question->dificultad == 2)
            <td class="centered ">Media</td>
            @else
            <td class="centered ">Alta</td>
            @endif

            <td hidden><input class="row_puntaje" type="text" value="{{$question->puntaje}}" name="arrPuntajes[{{$question->id}}]"></td>
            <td class="centered oculto puntaje" hidden>{{ $question->puntaje }}</td>

            <td hidden><input class="row_evaluador" type="number" value="{{$question->responsable->IdDocente}}" name="arrEvaluadores[{{$question->id}}]"></td>
            <td class="centered oculto responsable" hidden>{{ explode(' ',trim($question->responsable->Nombre))[0].' '.$question->responsable->ApellidoPaterno}}</td>
            
            <td class="centered">
                <input style="position: relative;left: 0px;opacity: 1" type="checkbox" value="2" name="arr[{{$question->id}}]" class="questions_selected"> 
            </td>                    
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <center>
            <a data-remodal-action="cancel" class="btn btn-success" onclick="selectQuestions()" id="select-questions"><i class="fa fa-plus"></i> Agregar a la evaluación</a>
        </center>
    </div>
</div>
@else
<h5>No existen preguntas con los filtros aplicados.</h5>
@endif