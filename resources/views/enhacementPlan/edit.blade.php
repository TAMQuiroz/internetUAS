@extends('app')
@section('content')

    <style type="text/css">
        .fila-base{ display: none; } /* Fila Base Oculta */
    </style>

    <div class="page-title">
        <div class="title_left">
            <h3>{{ $title }}</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="separator"></div>

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form class="form-horizontal" novalidate="true" action="{{ route('update.enhacementPlan')}}" method="POST" id="editImprovementPlan" name="editImprovementPlan">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input name="improvementPlanId" id="improvementPlanId" value="{{$improvementPlan->IdPlanMejora}}" hidden="true" type="text">
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Título <span class="error">* </span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" name="title" id="title" value="{{$improvementPlan->Descripcion}}" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Plan de Mejora <span class="error">* </span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" name="typePlan" id="typePlan">
                                    <option value="0">--Seleccione--</option>
                                    @foreach($typeImprovementPlans as $typePlans)
                                        <option value="{{$typePlans->IdTipoPlanMejora}}" <?php if ($improvementPlan->IdTipoPlanMejora == $typePlans->IdTipoPlanMejora): ?> selected="true"<?php endif ?>>{{$typePlans->Codigo}} ({{$typePlans->Tema}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Hallazgo <span class="error">* </span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control col-md-7 col-xs-12" name="find" id="find" style="resize: vertical;">{{$improvementPlan->Hallazgo}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Análisis Causal <span class="error">* </span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control col-md-7 col-xs-12" name="analysis" id="analysis" style="resize: vertical;">{{$improvementPlan->AnalisisCausal}}</textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Responsable <span class="error">* </span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" name="responsible" id="responsible">
                                    <option value="0">--Todos--</option>
                                    @foreach($teachers as $teach)
                                        <option value="{{$teach->IdDocente}}" <?php if ($teach->IdDocente == $improvementPlan->IdDocente): ?> selected="true"

                                        <?php endif ?>>{{$teach->Nombre}} {{$teach->ApellidoPaterno}} {{$teach->ApellidoMaterno}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Implementación <span class="error">* </span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" name="dateI" id="dateI" value="<?php  echo date('d/m/Y',strtotime($improvementPlan->FechaImplementacion));?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Estado <span class="error">* </span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" name="state" id="state">
                                    <?php if (date('Y-m-d',strtotime($improvementPlan->FechaImplementacion)) > date('Y-m-d')): ?>
                                        <option value="Pendiente" <?php if ($improvementPlan->Estado == "Pendiente"): ?> selected="true"<?php endif ?>>Pendiente</option>
                                    <?php endif ?>
                                    <?php if (date('Y-m-d',strtotime($improvementPlan->FechaImplementacion)) <= date('Y-m-d')): ?>
                                        <option value="En Ejecución" <?php if ($improvementPlan->Estado == "En Ejecución"): ?> selected="true"<?php endif ?>>En Ejecución</option>
                                    <?php endif ?>
                                    <?php if (date('Y-m-d',strtotime($improvementPlan->FechaImplementacion)) <= date('Y-m-d')): ?>
                                        <option value="Cerrado" <?php if ($improvementPlan->Estado == "Cerrado"): ?> selected="true"<?php endif ?>>Cerrado</option>
                                    <?php endif ?>
                                </select>
                            </div>
                        </div>
                    <!--
					<div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Archivo </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						        <input class="form-control col-md-7 col-xs-12" type="file" name="filefield">
						        <input type="hidden" name="_token" value="{{ csrf_token() }}">
						</div>
					</div>
					-->
                        <div class="clearfix"></div>
                        <h2>Actividades Planteadas</h2>
                        <div class="separator"></div>

                        <table class="table table-bordered" id="address-table" name="address-table">
                            <thead>
                            <tr>
                                <th class="col-sm-2">Periodo</th>
                                <th class="col-sm-5">Descripción</th>
                                <th class="col-sm-3">Responsable</th>
                                <th class="col-sm-1"></th>
                            </tr>
                            </thead>
                            <tbody>

                            <!--Fila Base Oculta-->
                            <tr class="fila-base">
                                <td hidden="true"><input type="text" name="idAction[]" id="idAction"/></td>
                                <td style="vertical-align:middle">
                                    <select class="form-control col-md-7 col-xs-12" name="cicle[]" id="cicle">
                                        @foreach($cicles as $cicle)
                                            <option value="{{$cicle->IdCicloAcademico}}">{{$cicle->Descripcion}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td style="vertical-align:middle"><textarea type="text" class="form-control" name="desc[]" id="desc" rows="2" title="Debe ingresar la Descripción de la Acción" required style="resize: vertical;"></textarea></td>
                                <td style="vertical-align:middle">
                                    <select class="form-control col-md-7 col-xs-12" name="respon[]" id="respon" width="%50">
                                        <option value="0">--Todos--</option>
                                        @foreach($teachers as $teach)
                                            <option value="{{$teach->IdDocente}}">{{$teach->Nombre}} {{$teach->ApellidoPaterno}} {{$teach->ApellidoMaterno}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="text-center eliminar" style="vertical-align:middle">
                                    <a class="btn btn-danger btn-xs" title="Eliminar"><i class="fa fa-remove fa-lg"></i></a>
                                </td>
                                <!--<td class="text-center text-danger"><i class="fa fa-remove fa-lg"></i></td>-->
                            </tr>
                            <!--Fin Fila Base Oculta-->

                            @foreach($actionplan as $act)
                                <tr>
                                    <td hidden="true"><input type="text" name="idAction[]" id="idAction" value="{{$act->IdPlanAccion}}"/></td>
                                    <td style="vertical-align:middle">
                                        <select class="form-control col-md-7 col-xs-12 " name="cicle[]" id="cicle">
                                            @foreach($cicles as $cicle)
                                                <option value="{{$cicle->IdCicloAcademico}}" <?php if ($act->IdCicloAcademico == $cicle->IdCicloAcademico): ?>
                                                selected="true"
                                                <?php endif ?>>{{$cicle->Descripcion}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td style="vertical-align:middle"><textarea type="text" class="form-control" name="desc[]" id="desc" rows="2" title="Debe ingresar la Descripción de la Acción" required style="resize: vertical;">{{$act->Descripcion}}</textarea></td>
                                    <td style="vertical-align:middle">
                                        <select class="form-control col-md-7 col-xs-12" name="respon[]" id="respon" width="%50">
                                            <option value="0">--Todos--</option>
                                            @foreach($teachers as $teach)
                                                <option value="{{$teach->IdDocente}}" <?php if ($act->IdDocente== $teach->IdDocente): ?>
                                                selected="true"
                                                <?php endif ?>>{{$teach->Nombre}} {{$teach->ApellidoPaterno}} {{$teach->ApellidoMaterno}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="text-center eliminar" style="vertical-align:middle">
                                        <a class="btn btn-danger btn-xs delete-action" title="Eliminar"><i class="fa fa-remove fa-lg"></i></a>
                                    </td>
                                    <!--<td class="text-center text-danger"><i class="fa fa-remove fa-lg"></i></td>-->
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a class="btn btn-success pull-right" id="btn-add-address" name="btn-add-address" type="button"><i class="fa fa-plus"></i> Nueva Acción</a>
                        <!--<button class="btn btn-success" id="btn-add-address pull-right" type="button">Agregar Otra Acción</button>-->
                        <div class="hr-line-dashed"></div>
                        <div class="clearfix"></div>
                        <div class="separator"></div>

                        <div class="row">
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <button class="btn btn-success pull-right" type="submit"> Guardar</button>
                                <a href="{{ route('index.enhacementPlan') }}" class="btn btn-default pull-right"> Cancelar</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            Dropzone.autoDiscover = false;
            $("#dropzone-enhacement").dropzone({ url: "/#" });
        });
    </script>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script>
        jQuery(function ($) {
            $.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
                    'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
                dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
        });
    </script>
    <script>
        $(function () {
            $.datepicker.setDefaults($.datepicker.regional["es"]);
            $("#dateI").datepicker({
                firstDay: 1,
                minDate: <?php  echo date('d/m/Y',strtotime($improvementPlan->FechaImplementacion)); ?>
            });
        });
    </script>
    <script src="{{ URL::asset('js/intranetjs/improvementPlans/edit-improvementPlans-script.js')}}"></script>
    <script src="{{ URL::asset('js/myvalidations/improvementPlan.js')}}"></script>
@endsection