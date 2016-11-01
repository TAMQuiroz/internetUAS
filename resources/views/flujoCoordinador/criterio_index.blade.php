@extends('appWithoutHamburger')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Lista de criterios</h3>
        </div>
    </div>
    


    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <form action="{{ route('criterio_create.flujoCoordinador', $idEspecialidad)}}" method="GET" id="formTeacher" name="formTeacher" novalidate="true" class="">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <div class="row">
                            <div  class="col-sm-2"></div>
                            <label for="resultado" class="control-label col-sm-4 col-xs-12">Resultado estudiantil<span class="error">*</span></label>
                            <div class="col-sm-4 col-xs-12">
                                <select  required="true" name="resultado" id="resultado" class="form-control">
                                    <option value="">--Seleccione--</option>
                                    @foreach($resultados as $resultado)
                                        <option value= "{{$resultado->IdResultadoEstudiantil}}">{{$resultado->Descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div  class="col-sm-2"></div>
                        </div>

                        <div class="row">
                            <div  class="col-sm-2"></div>
                            <label for="aspecto" class="control-label col-sm-4 col-xs-12">Aspecto<span class="error">*</span></label>
                            <div class="col-sm-4 col-xs-12">
                                <select  required="true" name="aspecto" id="aspecto" class="form-control">
                                    <option value="">--Seleccione--</option>
                                    @foreach($resultados as $resultado)
                                        @foreach ($resultado->aspects as $aspecto)
                                            <option value= "{{$aspecto->IdAspecto}}">{{$aspecto->Nombre}}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div  class="col-sm-2"></div>
                        </div>
                        
                        <br>
                        <br>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                 <button class="btn btn-success pull-right" type="submit"><i class="fa fa-plus"></i> Nuevo Criterio</button>
                            </div>
                        </div>
                    </div>   
                        
                </form>


                <div class="clearfix"></div>
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Criterio</th>
                        <th class="column-title">Aspecto</th>
                        <th class="column-title">Resultado Estudiantil</th>
                        <th class="column-title">Estado</th>
                        
                    </tr>
                    </thead>
                    <tbody id="criterio-fc-table">

                     
                    @foreach($resultados as $resultado)
                        <!--Primero va los criterios-->
                        
                        @foreach ($resultado->aspects as $aspecto)

                            @foreach ($aspecto->criterions as $criterio)
                                <tr>
                                    <td class="" hidden="true">{{$criterio->IdCriterio}}</td>
                                    <td class="">{{$criterio->Nombre}}</td>
                                    <td class="">{{$aspecto->Nombre}}</td>
                                    <td class="">{{$resultado->Descripcion}}</td>
                                    <td class="a-center" >
                                        <?php if ($criterio->Estado==1): ?>
                                        <span class="label label-success">Activo</span>
                                        <?php endif ?>
                                        <?php if ($criterio->Estado==0): ?>
                                        <span class="label label-danger">Inactivo</span>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            @endforeach
                            
                        @endforeach

                    @endforeach

                    </tbody>
                </table>


                <br>
                <br>
                <div class="separator"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <a href="{{ route('aspect_index.flujoCoordinador', $idEspecialidad) }}" class="btn btn-default">< Atras</a>
                        <a id="criterio-siguiente-btn" href="{{ route('end1.flujoCoordinador', $idEspecialidad) }}" class="btn btn-success pull-right">Siguiente ></a>
                         
                    </div>
                </div>

            </div>

        </div>
    </div>
        <script>      
            var fila = $("#criterio-fc-table").find("tr");
            if (fila.length == 0) {
                $('#criterio-siguiente-btn').attr("disabled","disabled");
                $('#criterio-siguiente-btn').click(function(){return false;});
            }

        </script>
        <script src="{{ URL::asset('js/intranetjs/teachers/index-teacher-script.js')}}">
    
@endsection