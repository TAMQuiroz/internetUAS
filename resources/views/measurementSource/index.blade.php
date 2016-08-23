@extends('app')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="">

                <div class="page-title">
                    <div class="title_left">
                        <h3> {{ $title }} </h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="x_panel">
                            <div class="x_content">

                                <div class="row">
                                    <div class="col-md-8 col-sm-12 col-xs-12">
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        @if(in_array(30, Session::get('actions')))
                                            <a class="btn btn-success pull-right" data-target="#source-new" data-toggle="modal" >
                                                <i class="fa fa-plus"></i> Nuevo Instrumento de Medición</a>
                                        @endif
                                    </div>
                                </div>

                                <table class="table table-striped responsive-utilities jambo_table bulk_action" id="source-table">
                                    <thead>
                                    <tr class="headings">
                                        <th class="column-title">Nombre </th>
                                        <th class="column-title last">Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($sources!=null)
                                        @foreach($sources as $src)
                                            <tr class="even pointer">
                                                <input type="hidden" class="srcCode" value="@if($src!=null){{$src->IdFuenteMedicion}}@endif"/>
                                                <td class="code" hidden >@if($src!=null){{$src->IdFuenteMedicion}}@endif</td>
                                                <td class="srcName" >@if($src!=null){{$src->Nombre}}@endif</td>
                                                <td class=" ">
                                                    @if(in_array(32, Session::get('actions')))
                                                        <a class="btn btn-primary btn-xs edit-source" ><i class="fa fa-pencil"></i></a>
                                                    @endif

                                                    @if(in_array(33, Session::get('actions')))
                                                        <a class="btn btn-danger btn-xs remove-source" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-remove"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>

                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('measurementSource.source-new-modal', ['title' => 'Nuevo Instrumento de Medición'])
    @include('measurementSource.source-edit-modal', ['title' => 'Editar Instrumento de Medición'])
    @include('modals.delete-modal', ['message' => '¿Esta seguro que desea eliminar el instrumento de medición?'])

    <script src="{{ URL::asset('js/intranetjs/measurementSource/index-measurementSource-script.js')}}"></script>

    <script type="text/javascript">
        @if( @Session::has('error') )
           toastr.error('{{ @Session::get('error') }}');
        @endif
    </script>

@endsection