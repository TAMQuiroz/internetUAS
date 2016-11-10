@extends('appWithoutHamburger')
@section('content')

<div class="page-title">
    <div class="title_left">
        <h3>{{$title}}</h3>
    </div>
</div>

<div class="clearfix"></div>

<form action="{{ route('period_store.flujoCoordinador',$idEspecialidad) }}" method="GET" id="formEditPeriod"  name="formEditPeriod" novalidate="true" class="form-horizontal">

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="text" id="validateIdentifier" name="validateIdentifier" hidden>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="form-horizontal">
                    <div class="row" style="margin-top: 10px;">
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ciclo Inicio<span class="error">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control cycleClass" name="cycleStart" id="cycleStart">
                                        <option value="0">-- Seleccione --</option>
                                        @foreach($semesters as $s)
                                            <option numero="{{ $s->Numero }}" value="{{ $s->IdCicloAcademico }}">{{ $s->Descripcion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><span class="error"></span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <p style= "color:#a94442; font-weight: 700; margin-bottom: 5px; max-width: 100%;" id="validation" name="validation"> </p>
                        </div>
                    </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ciclo Fin<span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control cycleClass" name="cycleEnd" id="cycleEnd" required="true">
                                    <option value="0">-- Seleccione --</option>
                                    @foreach($semesters as $s)
                                        <option numero="{{ $s->Numero }}" value="{{ $s->IdCicloAcademico }}">{{ $s->Descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    </div>

                     <div class="row" style="margin-top: 10px;">
                     <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nivel de Criterio <span class="error"> *</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="criteriaLevel" class="form-control col-md-7 col-xs-12" type="number" name="criteriaLevel" value="">
                        </div>
                    </div>
                    </div>

                     <div class="row" style="margin-top: 10px;">
                     <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nivel de Aceptación <span class="error">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="facultyAgreementLevel" class="form-control col-md-7 col-xs-12" type="number" name="facultyAgreementLevel" value="" >
                        </div>
                    </div>
                    </div>

                     <div class="row" style="margin-top: 10px;">
                     <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Aceptación % <span class="error">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="facultyAgreement" class="form-control col-md-7 col-xs-12" type="number" name="facultyAgreement"  value="" >
                        </div>
                    </div>
                    </div>

                    <div class="separator"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <h2> Instrumentos de Medición </h2>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-measures">
                                <i class="fa fa-plus"></i> Asociar Instrumentos de Medición
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <table class="table table-striped responsive-utilities jambo_table bulk_action" id="measaure_table"  name="table-objs">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">Nombre</th>
                                <th class="column-title">Acción</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    <div class="separator"></div>

                    <div class="row">
                        <div class="col-md-6">
                            <h2> Asociar Objetivos Educacionales </h2>
                        </div>
                    </div>
                    <div class="separator"></div>

                    <div class="row">
                        <table class="table table-striped responsive-utilities jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th>
                                    <input type="checkbox" id="objCheckAll" name="objCheckAll">
                                </th>
                                <th colspan="3" scope="colgroup" class="text-center"> Objetivos Educacionales </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($educationalObjetives as $obj)
                                <?php $results = ""; ?>
                                @foreach($obj->studentsResults as $result)
                                    <?php $results = $results . " A" . $result->IdResultadoEstudiantil; ?>
                                @endforeach
                                <tr>
                                    <td>
                                        <input type="checkbox" value="{{$obj->IdObjetivoEducacional}}" id="objCheck{{$obj->IdObjetivoEducacional}}" class="objCheck {{$results}}" name="objCheck[]"  />
                                    </td>
                                    <td colspan="3" scope="colgroup">{{$obj->Numero}}. {{$obj->Descripcion}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h2> Asociar Resultados Estudiantiles </h2>
                        </div>
                    </div>
                    <div class="separator"></div>

                    <div class="row">
                        <table class="table table-striped responsive-utilities jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th>
                                    <input type="checkbox" id="stRstCheckAll" name="stRstCheckAll">
                                </th>
                                <th colspan="3" scope="colgroup" class="text-center"> Resultados Estudiantiles </th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            

                            @if ($studentsResults->isEmpty())
                            <tr>
                                <td></td>
                                <td><p style = "color: red;">Debe agregar almenos un resultado estudiantil. No podrá iniciar periodo</p></td>
                            </tr>   
                            @endif

                            @foreach($studentsResults as $stRst)
                                <?php $objs = ""; ?>
                                @foreach($stRst->educationalObjectives as $objective)
                                    <?php $objs = $objs . " O" . $objective->IdObjetivoEducacional; ?>
                                @endforeach
                                <tr class="success">
                                    <td>
                                        <input type="checkbox" value="{{$stRst->IdResultadoEstudiantil}}" id="stRstCheckA{{$stRst->IdResultadoEstudiantil}}" class="stRstCheck {{$objs}}" name="stRstCheck[]"  />
                                    </td>
                                    <td colspan="3" scope="colgroup">{{$stRst->Identificador}}. {{$stRst->Descripcion}}</td>
                                </tr>
                                @foreach($stRst->aspect as $asp)
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="checkbox" value="{{$asp->IdAspecto}}" id="aspCheckC{{$asp->IdAspecto}}" class="aspCheck A{{$stRst->IdResultadoEstudiantil}} {{$objs}}" name="aspCheck[]"  />
                                        </td>
                                        <td colspan="2" scope="colgroup">{{ $asp->Nombre }}</td>
                                    </tr>
                                    @foreach($asp->criterion as $crt)
                                        <tr>
                                            <td scope="col" ></td>
                                            <td scope="col" ></td>
                                            <td>
                                                <input type="checkbox" value="{{$crt->IdCriterio}}" id="crtCheck{{$crt->IdCriterio}}" class="crtCheck A{{$stRst->IdResultadoEstudiantil}} C{{$asp->IdAspecto}} {{$objs}}" name="crtCheck[]"  />
                                            </td>
                                            <td colspan="1" scope="colgroup">{{ $crt->Nombre }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach



                            </tbody>
                            


                        </table>
                    </div>

                    <div class="row"></div>
                    <div class="separator"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px;">
                            <!--<a class="btn btn-default pull-left" href="{{ route('end2.flujoCoordinador',$idEspecialidad) }}"> < ATRAS</a>-->
                            <button class="btn btn-success pull-right submit" type="submit" >SIGUIENTE > </button>
                            
                            <!--
                            <div class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-continue">
                                <i class="fa fa-plus"></i> SIGUIENTE >
                            </div>  -->
                                
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

</form>

<script src="{{ URL::asset('js/myvalidations/confFaculty.js')}}"></script>
<script src="{{ URL::asset('js/myvalidations/periods.js')}}"></script>
<script src="{{ URL::asset('js/intranetjs/period/edit-script.js')}}"></script>

@include('flujoCoordinador.period-modal-measures')
@endsection