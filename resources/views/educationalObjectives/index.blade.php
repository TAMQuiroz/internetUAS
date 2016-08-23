@extends('app')
@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>{{ $title }}</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if(in_array(15, Session::get('actions')))
                            <a href="{{ route('new.educationalObjectives') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nuevo Objetivo Educacional</a>
                        @endif
                    </div>
                </div>

                <div class="clearfix"></div>

                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="col-sm-2 column-title">Estado</th>
                        <th class="column-title" hidden="true">Identificador</th>
                        <th class="col-sm-8 column-title">Descripción</th>
                        <th class="col-sm-2 column-title last">Acciones</th>

                        </th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @if($educationalObjetives!=null)
                        @foreach($educationalObjetives as $objs)
                            <tr class="even pointer">

                                <td class="id" hidden >@if($objs!=null) {{ $objs->IdObjetivoEducacional }} @endif</td>
                                @if($objs->Estado == 1)
                                    <td class=""><span class="label label-success"> Activo </span></td>
                                @else
                                    <td class=""><span class="label label-danger"> Inactivo </span></td>
                                @endif
                                <td class=" " hidden="true">@if($objs!=null) {{ $objs->Numero }} @endif</td>
                                <td class=" " >@if($objs!=null) {{ str_limit($objs->Descripcion, 60) }} @endif</td>

                                <td class=" ">
                                    @if(in_array(19, Session::get('actions')))
                                        <a href="{{ route('view.educationalObjectives', ['educationalObjetive_code' => $objs->IdObjetivoEducacional]) }}" class="btn btn-primary btn-xs"><i class="fa fa-search"></i></a>
                                    @endif

                                    @if(in_array(17, Session::get('actions')))
                                        <a href="{{ route('edit.educationalObjectives', ['educationalObjetive_code' => $objs->IdObjetivoEducacional]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    @endif

                                    @if(in_array(18, Session::get('actions')))
                                        <a href="" class="btn btn-danger btn-xs delete-educationalObjetive" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-remove"></i></a>
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

    <script src="{{ URL::asset('js/intranetjs/educationalObjetives/index-educationalObjetive-script.js')}}"></script>
    @include('modals.delete-modal', ['message' => '¿Esta seguro que desea eliminar el objetivo educacional?'])
    @include('educationalObjectives.view-modal', ['title' => 'Objetivo Educacional #'])

    <script type="text/javascript">
        @if( @Session::has('error') )
           toastr.error('{{ @Session::get('error') }}');
        @endif
    </script>

@endsection