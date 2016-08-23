@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Tipos Planes de Mejora</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
					</span>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if(in_array(49,Session::get('actions')))
                            <a href="{{ route('new.typeImprovement') }}" class="btn btn-success pull-right">
                                <i class="fa fa-plus"></i> Nuevo Tipo Plan de Mejora</a>
                        @endif
                    </div>
                </div>
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Código </th>
                        <th class="column-title">Tema Relacionado</th>
                        <th class="column-title">Descripción</th>
                        <th class="column-title last">Acciones</th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($typeImprovementPlans as $typeplan)
                        <tr class="even pointer">
                            <td class="typeImprovementPlanId" hidden="true">{{$typeplan->IdTipoPlanMejora}}</td>
                            <td class="code">{{$typeplan->Codigo}}</td>
                            <td class="theme">{{$typeplan->Tema}}</td>
                            <?php if ($typeplan->Descripcion != null): ?>
                            <td class="description">{{$typeplan->Descripcion}}</td>
                            <?php else: ?>
                            <td class="description"> - </td>
                            <?php endif ?>
                            <td class=" ">
                                @if(in_array(52,Session::get('actions')))
                                    <a class="btn btn-primary btn-xs view-typeImprovementPlan" data-toggle="modal" data-target=".bs-example-modal-lg" title="Visualizar"><i class="fa fa-search"></i></a>
                                @endif

                                @if(in_array(51,Session::get('actions')))
                                    <a href="{{ route('edit.typeImprovement' , ['typeImprovementPlanId' => $typeplan->IdTipoPlanMejora])}}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                                @endif

                                @if(in_array(77,Session::get('actions')))
                                    <a class="btn btn-danger btn-xs delete-typeImprovement" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-remove"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('js/intranetjs/typeImprovementPlans/index-typeImprovementPlans-script.js')}}"></script>
    
    @include('typeImprovementPlan.view-modal', ['title' => 'Ver Tipo Plan de Mejora'])
    @include('modals.delete-modal', ['message' => '¿Esta seguro que desea eliminar el tipo de plan de mejora?'])

@endsection