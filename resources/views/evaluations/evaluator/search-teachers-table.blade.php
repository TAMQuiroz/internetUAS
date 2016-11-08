@if(! $teachers->isEmpty())
<table class="table table-striped responsive-utilities jambo_table bulk_action" name="table-objs">
    <thead>
        <tr class="headings">                
            <th class="centered column-title">Código</th>
            <th class="column-title">Apellidos, Nombres</th>
            <th class="centered column-title">Especialidad</th>
            <th class="centered column-title">Seleccionar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teachers as $teacher)
        <tr>
            <td class="centered">{{ $teacher->Codigo }}</td>
            <td>{{ $teacher->ApellidoPaterno.' '.$teacher->ApellidoMaterno.', '.$teacher->Nombre}}</td>
            <td class="centered">{{ $teacher->faculty->Nombre }}</td>
            <td class="centered">
                <a class="btn btn-default" data-remodal-action="cancel" title="Seleccionar" onclick="select(
                    {{ $teacher->IdDocente}}, 
                    '{{$teacher->ApellidoPaterno}}',
                    '{{$teacher->ApellidoMaterno}}',
                    '{{$teacher->Nombre}}'
                    )">
                    <i class="fa fa-check"></i>
                </a>
            </td>                    
        </tr>
        @endforeach
    </tbody>
</table>
@else
<h5>No existen profesores con los filtros aplicados.</h5>
@endif
