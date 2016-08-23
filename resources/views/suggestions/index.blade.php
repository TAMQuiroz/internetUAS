@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Mis Sugerencias</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="separator"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <a href="{{ route('new.suggestions') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nueva Sugerencia</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <table class="table table-striped responsive-utilities jambo_table bulk_action">
                        <thead>
                        <tr class="headings">
                            <th class="column-title col-sm-2">Fecha Registro</th>
                            <th class="column-title col-sm-4">Título</th>
                            <th class="column-title col-sm-4">Plan de Mejora Asociado</th>
                            <th class="column-title last col-sm-2">Acciones</th>
                            </th>
                            <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($suggestions as $sug)
                            <tr class="even pointer">
                                <td class="suggestionId" hidden="true">{{$sug->IdSugerencia}}</td>
                                <td class=" ">{{$sug->created_at->format('d-m-Y')}}</td>
                                <td class="titleSuggestion">{{$sug->Titulo}}</td>
                                <?php if ($sug->IdPlanMejora != null): ?>
                                <td class=" ">{{$sug->improvementPlan->Descripcion}}</td>
                                <?php else: ?>
                                <td class=" ">No hay planes de mejora asociados</td>
                                <?php endif ?>
                                <td class=" ">
                                    @if(in_array(43, Session::get('actions')))
                                        <a class="btn btn-primary btn-xs view-suggestion" data-toggle="modal" data-target=".bs-example-modal-lg" title="Visualizar"><i class="fa fa-search"></i></a>
                                    @endif

                                    @if(in_array(42, Session::get('actions')))
                                        <?php if ($sug->IdDocente != null): ?>
                                        <?php if ($sug->IdDocente == Session::get('user')->IdDocente): ?>
                                        <a href="{{ route('edit.suggestions', ['suggestionId' => $sug->IdSugerencia]) }}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                                        <?php endif ?>
                                        <?php else: ?>
                                        <?php if (Session::get('user')->IdDocente == 0): ?>
                                        <a href="{{ route('edit.suggestions', ['suggestionId' => $sug->IdSugerencia]) }}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                                        <?php endif ?>
                                        <?php endif ?>
                                    @endif

                                    
                                        <a href="" class="btn btn-danger btn-xs delete-suggestion" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-remove"></i></a>
                                    
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('modals.delete-modal', ['message' => '¿Esta seguro que desea eliminar la sugerencia?', 'action' => '#', 'button' => 'Delete'])
    @include('suggestions.view-modal', ['title' => 'Ver Sugerencia'])

    <script src="{{ URL::asset('js/intranetjs/suggestions/index-suggestions-script.js')}}"></script>
@endsection