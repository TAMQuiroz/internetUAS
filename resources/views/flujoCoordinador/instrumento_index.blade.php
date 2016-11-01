@extends('appWithoutHamburger')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Lista de Instrumentos de Medición</h3>
        </div>
    </div>
    
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                            <a href="{{ route('instrumento_create.flujoCoordinador', $idEspecialidad) }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nuevo Instrumento de Medición</a>
                    </div>
                </div>

                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Nombre de Instrumento</th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody id="instrumento-fc-table">
                    @foreach($instrumentos as $instrumento)
                        <tr class="even pointer">
                            <td class="id" hidden="true">{{$instrumento->IdFuenteMedicion}}</td>
                            <td class="">{{ $instrumento->Nombre }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

            <div class="row"></div>
                <div class="separator"></div>
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">                         
                         <a href="{{ route('criterio_index.flujoCoordinador', $idEspecialidad) }}" class="btn btn-default pull-left">< Atras</a>
                         <a id ="instrumento-siguiente-btn" href="{{ route('end1.flujoCoordinador', $idEspecialidad) }}" class="btn btn-success pull-right">Siguiente ></a>
                    </div>
                </div>

        </div>

        @include('measurementSource.source-new-modal', ['title' => 'Nuevo Instrumento de Medición'])
        @include('measurementSource.source-edit-modal', ['title' => 'Editar Instrumento de Medición'])

        <script src="{{ URL::asset('js/intranetjs/measurementSource/index-measurementSource-script.js')}}"></script>
        <script type="text/javascript">
            @if( @Session::has('error') )
               toastr.error('{{ @Session::get('error') }}');
            @endif

            var fila = $("#instrumento-fc-table").find("tr");
            if (fila.length == 0) {
                $('#instrumento-siguiente-btn').attr("disabled","disabled");
                $('#instrumento-siguiente-btn').click(function(){return false;});
            }
        </script>
@endsection