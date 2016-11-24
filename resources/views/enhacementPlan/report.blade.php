@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Reporte de Planes de Mejora</h3>
        </div>
        
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="clearfix"></div>
                
                
                    @foreach($improvementPlans as $iplan)
                    <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="col-sm-3 text-center" style="vertical-align: middle">Nombre de plan de mejora</th>
                        <th class="col-sm-1 text-center" style="vertical-align: middle">Fecha de implementación</th>
                        
                        <th class="col-sm-2 text-center" style="vertical-align: middle">Responsable</th>
                        <th class="col-sm-1 text-center" style="vertical-align: middle">Estado</th>
                        <th class="col-sm-3 text-center" style="vertical-align: middle">Tipo plan de mejora</th>
                        
                        
                    </tr>
                    </thead>
                    <tbody>
                        <tr class="even pointer">
                            <td class="improvementPlanId" hidden="true">{{$iplan->IdPlanMejora}}</td>
                            <td class="col-sm-3 text-center">{{$iplan->Descripcion}}</td>
                            <td class="col-sm-1 text-center" >
                                <?php
                                $date = new DateTime($iplan->FechaImplementacion);
                                echo date_format($date, "d-m-Y");
                                ?>
                            </td>

                            <?php if ($iplan->IdDocente != null): ?>
                            <td class="col-sm-2 text-center">{{$iplan->teacher->Nombre}} {{$iplan->teacher->ApellidoPaterno}}</td>
                            <?php else: ?>
                            <td class="col-sm-2 text-center">Todos</td>
                            <?php endif ?>

                            

                            <td class="state col-sm-1 text-center"><span <?php if ($iplan->Estado=="Pendiente"): ?>
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
                            
                            
                            <td class="col-sm-3 text-center">{{$iplan->typeImprovementPlan->Codigo}} ({{$iplan->typeImprovementPlan->Tema}})</td>
                            
                        </tr>
                        
                    </tbody>
                    </table>

                    <table class="table" >
                            <thead>
                            <tr class="headings" style="background-color:#337ab7;color:#ECF0F1;">
                                
                                <th class="col-sm-3 text-center" style="vertical-align: middle">Nombre de la Actividad</th>
                                <th class="col-sm-1 text-center" style="vertical-align: middle">Ciclo</th>
                                <th class="col-sm-2 text-center" style="vertical-align: middle">Responsable</th>
                                <th class="col-sm-1 text-center" style="vertical-align: middle">Avance</th>
                                
                                <th class="col-sm-3 text-center" style="vertical-align: middle">Comentario</th>
                            </tr>
                            </thead>
                            <tbody>  
                            @foreach($iplan->actions as $act)
                             
                            <tr class="even pointer">
                            
                            <td class="col-sm-3 text-center">{{$act->Descripcion}}</td>
                            <td class="col-sm-1 text-center">{{$act->cicle->Descripcion}}</td>
                            <td scope="col" class="col-sm-2 text-center" style="vertical-align: middle;">
                                    <?php if ($act->IdDocente != null): ?>
                                        {{$act->teacher->Nombre}} {{$act->teacher->ApellidoPaterno}} {{$act->teacher->ApellidoMaterno}}
                                    <?php else: ?>
                                        Todos
                                    <?php endif ?>      
                                </td>
                                                                  
                            <td class="col-sm-1 text-center">   @if ($act->Porcentaje == 0)  0%
                                        @elseif ($act->Porcentaje == 5)  5%
                                        @elseif ($act->Porcentaje == 10) 10%
                                        @elseif ($act->Porcentaje == 15) 15%
                                        @elseif ($act->Porcentaje == 20) 20%
                                        @elseif ($act->Porcentaje == 25) 25%
                                        @elseif ($act->Porcentaje == 30) 30%
                                        @elseif ($act->Porcentaje == 35) 35%
                                        @elseif ($act->Porcentaje == 40) 40%
                                        @elseif ($act->Porcentaje == 45) 45%
                                        @elseif ($act->Porcentaje == 50) 50%
                                        @elseif ($act->Porcentaje == 55) 55%
                                        @elseif ($act->Porcentaje == 60) 60%
                                        @elseif ($act->Porcentaje == 65) 65%
                                        @elseif ($act->Porcentaje == 70) 70%
                                        @elseif ($act->Porcentaje == 75) 75%
                                        @elseif ($act->Porcentaje == 80) 80%
                                        @elseif ($act->Porcentaje == 85) 85%
                                        @elseif ($act->Porcentaje == 90) 90%
                                        @elseif ($act->Porcentaje == 95) 95%
                                        @elseif ($act->Porcentaje == 100) 100%
                                        @endif
                            </td>
                            <td class="col-sm-3 text-center">
                                    
                                {{$act->Comentario}}</td>
                            
                            </tr>
                            @endforeach
                            </tbody>
                    </table>
                    <br>
                    @endforeach
                    
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('js/intranetjs/improvementPlans/index-improvementPlans-script.js')}}"></script>
    @include('modals.delete-modal', ['message' => '¿Esta seguro que desea eliminar el plan de mejora?', 'action' => '#', 'button' => 'Delete'])
    @include('enhacementPlan.view-modal', ['title' => 'Ver Plan de Mejora'])
@endsection