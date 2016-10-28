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
                    <form class="form-horizontal" novalidate="true" action="{{ route('save.enhacementPlan', [])}}" method="POST" id="formImprovementPlan" name="formImprovementPlan" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Título <span class="error">* </span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" name="title" id="title" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Plan de Mejora <span class="error">* </span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" name="typePlan" id="typePlan">
                                    <option value="0">--Seleccione--</option>
                                    @foreach($typeImprovementPlans as $typePlans)
                                        <option value="{{$typePlans->IdTipoPlanMejora}}">{{$typePlans->Codigo}} ({{$typePlans->Tema}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Hallazgo <span class="error">* </span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control col-md-7 col-xs-12" name="find" id="find" style="resize: vertical;"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Análisis Causal <span class="error">* </span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control col-md-7 col-xs-12" name="analysis" id="analysis" style="resize: vertical;"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Responsable <span class="error">* </span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" name="responsible" id="responsible">
                                    <option value="0">--Todos--</option>
                                    @foreach($teachers as $teach)
                                        <option value="{{$teach->IdDocente}}">{{$teach->Codigo}} - {{$teach->Nombre}} {{$teach->ApellidoPaterno}} {{$teach->ApellidoMaterno}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de Implementación <span class="error">* </span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" name="dateI" id="dateI" minlength="10" maxlength="10" value=""/>
                            <!--<?php echo date("d/m/Y");?>-->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Archivo </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="filefield" id="filefield">
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <h2>Actividades Planteadas</h2>
                        <div class="separator"></div>
                        <div class="row title_right">
                            @if(Auth::user() && ((Auth::user()->IdPerfil == 3) || (Auth::user()->IdPerfil == 1)))
                                <button class="btn btn-success pull-right cicleModal" type="submit" data-toggle="modal" 
                                data-target="#cicleModal" > Nuevo ciclo</button>
                            @endif
                       </div>
                        <table class="table table-bordered" id="address-table" name="address-table">
                            <thead>
                            <tr>
                                <th class="col-sm-2">Ciclo</th>
                                <th class="col-sm-5">Descripción</th>
                                <th class="col-sm-3">Responsable</th>
                                <th class="col-sm-1"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <!--Fila Base Oculta-->
                            <tr class="fila-base">
                                <td style="vertical-align:middle">
                                    <select class="form-control col-md-7 col-xs-12" name="cicle[]" id="cicle">
                                        @foreach($cicles as $cicle)
                                            <option value="{{$cicle->IdCicloAcademico}}">{{$cicle->Descripcion}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td style="vertical-align:middle"><textarea type="text" class="form-control" name="desc[]" id="desc" rows="2" required title="Debe ingresar la Descripción de la Acción" style="resize: vertical;"></textarea></td>
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
                            <!--Fila Ejemplo-->
                            <tr>
                                <td style="vertical-align:middle">
                                    <select class="form-control col-md-7 col-xs-12" name="cicle[]" id="cicle">
                                        @foreach($cicles as $cicle)
                                            <option value="{{$cicle->IdCicloAcademico}}">{{$cicle->Descripcion}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td style="vertical-align:middle"><textarea type="text" class="form-control" name="desc[]" id="desc" rows="2" required title="Debe ingresar la Descripción de la Acción" style="resize: vertical;"></textarea></td>
                                <td style="vertical-align:middle">
                                    <select class="form-control col-md-7 col-xs-12" name="respon[]" id="respon" width="%50">
                                        <option value="0">--Todos--</option>
                                        @foreach($teachers as $teach)
                                            <option value="{{$teach->IdDocente}}">{{$teach->Codigo}} - {{$teach->Nombre}} {{$teach->ApellidoPaterno}} {{$teach->ApellidoMaterno}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="text-center eliminar" style="vertical-align:middle">
                                    <a class="btn btn-danger btn-xs" title="Eliminar"><i class="fa fa-remove fa-lg"></i></a>
                                </td>
                                <!--<td class="text-center text-danger"><i class="fa fa-remove fa-lg"></i></td>-->
                            </tr>

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
                minDate: <?php echo date("d/m/Y");?>
            });
        });
    </script>
    <script src="{{ URL::asset('js/intranetjs/improvementPlans/form-improvementPlans-script.js')}}"></script>
    <script src="{{ URL::asset('js/myvalidations/improvementPlan.js')}}"></script>

    @include('enhacementPlan.save-modal', ['title' => 'Ver Plan de Mejora'])
@endsection