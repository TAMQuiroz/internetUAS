@extends('appWithoutHamburger')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Lista de Objetivos Educacionales</h3>
        </div>
    </div>
    


    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                            <a href="{{ route('objetivoEducacional_create.flujoCoordinador', $idEspecialidad) }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nuevo Objetivo Educacional</a>
                    </div>
                </div>

                <div class="clearfix"></div>

                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Objetivo Educacional</th>
                        <th class="column-title">Estado</th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody id="objetivos-fc-table">
                    @foreach($objetivos as $objetivo)
                        <tr class="even pointer">
                            <td class="id" hidden="true">{{$objetivo->IdObjetivoEducacional}}</td>
                            <td class="">{{ str_limit($objetivo->Descripcion, 60) }}</td>
                            @if($objetivo->Estado == 1)
                                    <td class=""><span class="label label-success"> Activo </span></td>
                                @else
                                    <td class=""><span class="label label-danger"> Inactivo </span></td>
                                @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

            <div class="row"></div>
                <div class="separator"></div>
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">                         
                         
                         <a  id ="objetivo-siguiente-btn" href="{{ route('studentResult_index.flujoCoordinador', $idEspecialidad) }}" class="btn btn-success pull-right">Siguiente ></a>
                    </div>
                </div>

        </div>
        
        <script src="{{ URL::asset('js/intranetjs/educationalObjetives/index-educationalObjetive-script.js')}}"></script>
        <script type="text/javascript">
            @if( @Session::has('error') )
               toastr.error('{{ @Session::get('error') }}');
            @endif
            //para el combobox se refresque solo
            $(document).ready(function(){
                var fila = $("#objetivos-fc-table").find("tr");
                if (fila.length == 0) {
                    $('#objetivo-siguiente-btn').attr("disabled",true);
                    $('#objetivo-siguiente-btn').click(function(){return false;});
                }
            });
        </script>
@endsection