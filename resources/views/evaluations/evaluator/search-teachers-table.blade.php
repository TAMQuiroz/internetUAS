@if(! $teachers->isEmpty())
<table class="table table-striped responsive-utilities jambo_table bulk_action" name="table-objs">
    <thead>
        <tr class="headings">                
            <th class="column-title">Código</th>
            <th class="column-title">Apellidos, Nombres</th>
            <th class="column-title">Especialidad</th>
            <th class="column-title">Seleccionar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teachers as $teacher)
        <tr>
            <td>{{ $teacher->Codigo }}</td>
            <td>{{ $teacher->ApellidoPaterno.' '.$teacher->ApellidoMaterno.', '.$teacher->Nombre}}</td>
            <td>{{ $teacher->faculty->Nombre }}</td>
            <td>
                <button class="btn btn-success" onclick="select(
                    {{ $teacher->IdDocente}}, 
                    '{{$teacher->ApellidoPaterno}}',
                    '{{$teacher->ApellidoMaterno}}',
                    '{{$teacher->Nombre}}'
                    )">
                    <i class="fa fa-check"></i>
                </button>
            </td>                    
        </tr>
        @endforeach
    </tbody>
</table>
@endif