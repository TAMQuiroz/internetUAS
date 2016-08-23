
    
    @if(! $suggestions->isEmpty())
        @foreach($suggestions as $sug)
        <tr class="even pointer"> 
            <td class="a-center ">
                @if($sug->Estado=='Solicitado')
                <span class="label label-info">{{$sug->Estado}}</span>
                @elseif($sug->Estado=='Aprobado')
                <span class="label label-success">{{$sug->Estado}}</span>
                @elseif($sug->Estado=='Rechazado')
                <span class="label label-danger">{{$sug->Estado}}</span>
                @endif
            </td>
            <td class="suggestionId" hidden="true">{{$sug->IdSugerencia}}</td>
            <td class=" ">{{$sug->created_at->format('d-m-Y')}}</td>
            <td class="titleSuggestion">{{$sug->Titulo}}</td>
            <?php if ($sug->IdTipoPlanMejora != null): ?>
                <td class=" ">{{$sug->typeImprovementPlan->Codigo}} ({{$sug->typeImprovementPlan->Tema}})</td>
            <?php else: ?>
                <td class=" ">-</td>
            <?php endif ?>
            <td class=" ">
                <a class="btn btn-primary btn-xs view-suggestion" data-toggle="modal" data-target=".bs-example-modal-lg" title="Visualizar"><i class="fa fa-search"></i></a>
            </td>
        </tr>
        @endforeach
    @endif
   

