@extends('appWithoutHamburger')
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
                    <a href="{{ route('studentResult_create.flujoCoordinador', $id) }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nuevo Resultado Estudiantil</a>
                    @endif
                </div>
            </div>

            <table class="table table-striped responsive-utilities jambo_table bulk_action">
                <thead>
                    <tr class="headings">
                        <th class="column-title">Identificador</th>
                        <th class="column-title">Descripción</th>
                        <th class="column-title">Estado</th>
                    </tr>
                </thead>
                <tbody id=resultado-fc-table>
                    @foreach($studentsResults as $stdRslt)
                    <tr class="even pointer">
                        <td class="id" hidden >{{ $stdRslt->IdResultadoEstudiantil }}</td>
                        <td class="">{{ $stdRslt->Identificador }}</td>
                        <td class="">{{ str_limit($stdRslt->Descripcion, 60) }}</td>
                        @if($stdRslt->Estado == 1)
                        <td class=""><span class="label label-success"> Activo </span></td>
                        @else
                        <td class=""><span class="label label-danger"> Inactivo </span></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="separator"></div>
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <a class="btn btn-default" href="{{ route('objetivoEducacional_index.flujoCoordinador', $id) }}">< Atras</a>
                         <a id="resultado-siguiente-btn" href="{{ route('aspect_index.flujoCoordinador', $id) }}" class="btn btn-success pull-right">Siguiente ></a>
                         
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script src="{{ URL::asset('js/intranetjs/studentsResults/index-studentsResult-script.js')}}"></script>

<script type="text/javascript">
    @if( @Session::has('error') )
       toastr.error('{{ @Session::get('error') }}');
    @endif


    var fila = $("#resultado-fc-table").find("tr");
            if (fila.length == 0) {
                $('#resultado-siguiente-btn').attr("disabled","disabled");
                $('#resultado-siguiente-btn').click(function(){return false;});
            }

</script>

@include('modals.delete-modal', ['message' => '¿Esta seguro que desea eliminar el resultado estudiantil?'])

@endsection

