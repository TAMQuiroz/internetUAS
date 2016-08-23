@extends('app')
@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>Sugerencias</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">

                    <form method="POST" id="form-search-suggestions" action="{{ route('search.suggestions')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <input type="hidden" name="idUser" id="idUser" value="{{Session::get('user')->IdDocente}}">

                        @if(Session::get('academic-cycle') == null)
                            <input type="hidden" name="idCoordinator" id="idCoordinator" value="-1">
                        @else
                            <input type="hidden" name="idCoordinator" id="idCoordinator" value="{{Session::get('academic-cycle')->IdDocente}}">
                        @endif

                        <div class="form-group row form-horizontal">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Plan de Mejora </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" name="typePlan" id="typePlan">
                                    <option value="0">-- Todos --</option>
                                    <option value="-1">-- Ninguno --</option>
                                    @foreach($improvementPlans as $impPlans)
                                        <option value="{{$impPlans->IdPlanMejora}}">{{$impPlans->Descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button  class="btn btn-success pull-right" id="btnSearch"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                    </div>

                    </form>

                    

                    <div class="form-group" >
                        <table class="table table-striped responsive-utilities jambo_table bulk_action" name="table-objs" >
                            <thead>
                            <tr class="headings">
                                <!--<th class="column-title">Estado</th>-->
                                <th class="column-title col-sm-2">Fecha Registro</th>
                                <th class="column-title col-sm-4">Título</th>
                                <th class="column-title col-sm-4">Plan de Mejora </th>
                                <th class="column-title last col-sm-2">Acciones</th>

                                <th class="bulk-actions" colspan="7">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                            </tr>
                            </thead>
                            <tbody id="suggestionTable">
                            @if(! $suggestions->isEmpty())
                                @foreach($suggestions as $sug)
                                    <tr class="even pointer">
                                        <td class="suggestionId" hidden="true">{{$sug->IdSugerencia}}</td>

                                        <td class=" ">{{$sug->created_at->format('d-m-Y')}}</td>

                                        <td class=" ">{{str_limit($sug->Titulo,40)}}</td>

                                        <?php if ($sug->IdPlanMejora != null): ?>
                                        <td class=" ">{{str_limit($sug->ImprovementPlan->Descripcion,40)}}</td>
                                        <?php else: ?>
                                        <td class=" "> No tiene plan de mejora asociado</td>
                                        <?php endif ?>

                                        <td class=" ">
                                            <a class="btn btn-primary btn-xs view-suggestion" data-toggle="modal" data-target=".bs-example-modal-lg" title="Visualizar"><i class="fa fa-search"></i></a>
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

    <script src="{{ URL::asset('js/intranetjs/suggestions/index-all-suggestions-script.js')}}"></script>

    @include('suggestions.view-modal-status', ['title' => 'Ver Sugerencia'])
@endsection