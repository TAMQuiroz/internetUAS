@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3> {{ $title }} </h3>
        </div>
    </div>
    

    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <form action="" method="GET" id="formTeacher" name="formTeacher" novalidate="true" class="">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <div class="row">
                            <div  class="col-sm-2"></div>
                            <label for="resultado" class="control-label col-sm-4 col-xs-12">Período<span class="error">*</span></label>
                            <div class="col-sm-4 col-xs-12">
                                <select  required="true" name="periodo" id="periodo" class="form-control">
                                    <option value="">--Seleccione--</option>
                                    @foreach($periodos as $periodo)
                                        <option value= "{{$periodo->IdResultadoEstudiantil}}">
                                            {{ $periodo->configuration->cycleAcademicStart->Descripcion }} - {{ $periodo->configuration->cycleAcademicEnd->Descripcion }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div  class="col-sm-2"></div>
                        </div>

                        <div class="row">
                            <div  class="col-sm-2"></div>
                            <label for="aspecto" class="control-label col-sm-4 col-xs-12">Resultado Estudiantil<span class="error">*</span></label>
                            <div class="col-sm-4 col-xs-12">
                                <select  required="true" name="aspecto" id="aspecto" class="form-control">
                                    <option value="">--Seleccione--</option>
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
                                </select>
                            </div>
                            <div  class="col-sm-2"></div>
                        </div>

                        <div class="row">
                            <div  class="col-sm-2"></div>
                            <label for="aspecto" class="control-label col-sm-4 col-xs-12">Criterio<span class="error">*</span></label>
                            <div class="col-sm-4 col-xs-12">
                                <select  required="true" name="aspecto" id="aspecto" class="form-control">
                                    <option value="">--Seleccione--</option>
                                </select>
                            </div>
                            <div  class="col-sm-2"></div>
                        </div>

                        <div class="row">
                            <div  class="col-sm-2"></div>
                            <label for="aspecto" class="control-label col-sm-4 col-xs-12">Curso<span class="error">*</span></label>
                            <div class="col-sm-4 col-xs-12">
                                <select  required="true" name="aspecto" id="aspecto" class="form-control">
                                    <option value="">--Seleccione--</option>
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
                        <th class="column-title">Resultado Estudiantil</th>
                        <th class="column-title">Aspecto</th>
                        <th class="column-title">Criterio</th>
                        <th class="column-title">Estado</th>
                        
                    </tr>
                    </thead>
                    <tbody id="criterio-fc-table">

                    </tbody>
                </table>


                <br>
                <br>
                <div class="separator"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <a href="#" class="btn btn-default">< Atras</a>
                        <a id="criterio-siguiente-btn" href="#" class="btn btn-success pull-right">Siguiente ></a>
                         
                    </div>
                </div>

            </div>

        </div>
    </div>


    <script>      
        var fila = $("#criterio-fc-table").find("tr");
        if (fila.length == 0) {
            $('#criterio-siguiente-btn').attr("disabled",true);
            //$('#criterio-siguiente-btn').click(function(){return false;});
        }

        //para el combobox se refresque solo
        $(document).ready(function(){
            $('#resultado').change(function(){
                $.get("{{ route('aspectosDelResultado.flujoCoordinador') }}",
                { resultado: $(this).val() },
                function(data) {
                    $('#aspecto').empty();
                    $.each(data, function(key, element) {
                        $('#aspecto').append("<option value='" + key + "'>" + element + "</option>");
                    });
                });
            });
        });     


    </script>
    <script src="{{ URL::asset('js/intranetjs/teachers/index-teacher-script.js')}}">
    
@endsection