@extends('app')
@section('content')

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>{{ $title }}</h3>
            </div>

            <div class="title_right">
              
            </div>
          </div>
          <div class="clearfix"></div>
          
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">

                  <div class="form-horizontal">
                    <div class="row" style="margin-top: 10px;margin-bottom: 10px;">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Ciclo </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="evidence-cicle" class="form-control col-md-7 col-xs-12" type="text" name="cicle" >
                          <option value="">-- Seleccione --</option>
                          @foreach($ciclos as $ciclo)
                            <option value="{{$ciclo->Descripcion}}">
                              {{ $ciclo->Descripcion }}
                            </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Archivos Subidos</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table id="evidences-esp-table"class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                      <tr>        
                      <th class="column-title">Ciclo Académico</th>                
                        <th class="column-title">Codigo del Curso</th>
                        <th class="column-title">Nombre del Curso</th>
                        <th class="column-title">Nombre del archivo</th>
                        <th class="column-title last">Descargar</th>
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                    @foreach($entries as $key => $entry)
		                <tr class="even pointer">
                        
                        <div>
                          <input type="hidden" name="currFileId[]" class="currFile" value="{{ $entry['IdArchivoEntrada'] }}">   
                            <td class="col1">{{ $entry['CicloAcademico'] }}</td>                      
                            <td class=" ">{{ $entry['CodigoCurso'] }}</td>
                            <td class=" ">{{ $entry['NombreCurso'] }}</td>
                            <td class=" ">{{ $entry['original_filename'] }}</td>
                            <td class=" ">
                              
                              <a href="{{route('getDownload.evidences', $entry['filename'])}}" class="">
                                <li style="margin-left:12px">
                                  <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                                  <span class="glyphicon-class">{{ $entry['original_filename'] }}</span>
                                </li>
                              </a>
                            
                            </td>
                            </td>
                        </div>                        
		                </tr>
		                @endforeach                     
                    </tbody>                   
                  </table>
                </div>
              </div>
            </div>
          </div>         
        </div>
        
        <script type="text/javascript">
          $(document).ready(function(){
              var $rows = $("#evidences-esp-table tbody > tr");

              $('#evidence-cicle').change(function(event){
                  var cicle = $('#evidence-cicle').val();

                  $("#evidences-esp-table td.col1:contains('" + cicle + "')").parent().show();
                  $("#evidences-esp-table td.col1:not(:contains('" + cicle + "'))").parent().hide();
               
              });
          });

        </script>
@endsection