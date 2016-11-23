@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Planes de Mejora</h3>
        </div>
        <form action="{{ route('search.enhacementPlan')}}" method="POST" id="formSearch" name="formSearch">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar" name="word" id="word">
    					<span class="input-group-btn">
    						<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
    					</span>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if(in_array(45,Session::get('actions')))
                            <a href="{{ route('new.enhacementPlan') }}" class="btn btn-success pull-right">
                                <i class="fa fa-plus"></i> Nuevo Plan de Mejora</a>
                        @endif
                    </div>
                </div>
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title col-sm-1" style="vertical-align: middle">Estado</th>
                        
                        <th class="column-title" style="vertical-align: middle">Responsable</th>
                        <th class="column-title col-sm-2" style="vertical-align: middle">Título</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($improvementPlans as $iplan)
                        <tr class="even pointer">
                            <td class="improvementPlanId" hidden="true">{{$iplan->IdPlanMejora}}</td>
                            <td class="state"><span <?php if ($iplan->Estado=="Pendiente"): ?>
                                                    class="label label-warning"
                                                    <?php else: ?>
                                                    <?php if ($iplan->Estado=="En Ejecución"): ?>
                                                    class="label label-success"
                                                    <?php else: ?>
                                                    <?php if ($iplan->Estado=="Terminado"): ?>
                                                    class="label label-success"
                                                    <?php else: ?>
                                                    class="label label-danger"
                                <?php endif ?>
                                <?php endif ?>
                                        <?php endif ?> >{{$iplan->Estado}}</span></td>
                            
                            <?php if ($iplan->IdDocente != null): ?>
                            <td class=" ">{{$iplan->teacher->Nombre}} {{$iplan->teacher->ApellidoPaterno}}</td>
                            <?php else: ?>
                            <td class=" ">Todos</td>
                            <?php endif ?>

                            <td class=" ">{{$iplan->Descripcion}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('js/intranetjs/improvementPlans/index-improvementPlans-script.js')}}"></script>
    @include('modals.delete-modal', ['message' => '¿Esta seguro que desea eliminar el plan de mejora?', 'action' => '#', 'button' => 'Delete'])
    @include('enhacementPlan.view-modal', ['title' => 'Ver Plan de Mejora'])
@endsection