@extends('app')
@section('content')

<div class="page-title">
    <div class="title_left">
        <h3>{{ $title }}</h3>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_content">

            <div class="row" style="margin-top: 10px;margin-bottom: 10px;">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    @if(in_array(20,Session::get('actions')))
                    <a href="{{ route('create.studentsResult') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nuevo Resultado Estudiantil</a>
                    @endif
                </div>
            </div>

            <table class="table table-striped responsive-utilities jambo_table bulk_action">
                <thead>
                    <tr class="headings">
                        <th class="column-title">Estado</th>
                        <th class="column-title">Identificador</th>
                        <th class="column-title">Descripción</th>
                        <th class="column-title last">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($studentsResults as $stdRslt)
                    <tr class="even pointer">
                        <td class="id" hidden >{{ $stdRslt->IdResultadoEstudiantil }}</td>
                        @if($stdRslt->Estado == 1)
                        <td class=""><span class="label label-success"> Activo </span></td>
                        @else
                        <td class=""><span class="label label-danger"> Inactivo </span></td>
                        @endif
                        <td class="">{{ $stdRslt->Identificador }}</td>
                        <td class="">{{ str_limit($stdRslt->Descripcion, 60) }}</td>
                        <td class=" ">
                            @if(in_array(24,Session::get('actions')))
                            <a href="{{ route('view.studentsResult', ['idStudentsResult' => $stdRslt->IdResultadoEstudiantil]) }}" class="btn btn-primary btn-xs"><i class="fa fa-search"></i></a>
                            @endif
                            @if(in_array(22,Session::get('actions')))
                            <a href="{{ route('edit.studentsResult', ['idStudentsResult' => $stdRslt->IdResultadoEstudiantil]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                            @endif
                            @if(in_array(23,Session::get('actions')))
                            <a class="btn btn-danger btn-xs delete-studentsResult" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-remove"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

<script src="{{ URL::asset('js/intranetjs/studentsResults/index-studentsResult-script.js')}}"></script>

<script type="text/javascript">
    @if( @Session::has('error') )
       toastr.error('{{ @Session::get('error') }}');
    @endif
</script>

@include('modals.delete-modal', ['message' => '¿Esta seguro que desea eliminar el resultado estudiantil?'])

@endsection

