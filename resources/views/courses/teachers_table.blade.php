@if(! $teachers->isEmpty())
    <table class="table table-striped responsive-utilities jambo_table bulk_action" name="table-objs">
        <thead>
            <tr class="headings">
                <th class="column-title">Seleccionar</th>
                <th class="column-title">Codigo</th>
                <th class="column-title">Nombre</th>
                <th class="column-title">Especialidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
                <tr>
                    <input type="hidden" name="regular_professors[]" value="{{ $teacher->IdDocente }}">
                    <td>
                        <input class="professors_selected flat" type="checkbox" value="{{ $teacher->IdDocente }}">
                    </td>
                    <td>{{ $teacher->Codigo }}</td>
                    <td>{{ "{$teacher->Nombre} {$teacher->ApellidoPaterno}" }}</td>
                    <td>{{ $teacher->faculty->Nombre }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-12 col-sm-6 col-xs-12 text-right">
            <div class="btn btn-success" id="select-professors"><i class="fa fa-check"></i> Seleccionar Profesores</div>
        </div>
    </div>

@endif