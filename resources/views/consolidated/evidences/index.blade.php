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
                <div class="x_title">
                  <h2>Archivos Subidos</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                      <tr>                        
                        <th class="column-title">Codigo </th>
                        <th class="column-title">Nombre del Archivo </th>
                        <th class="column-title last">Descargar</th>
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                    	@foreach($entries as $entry)
		                <tr class="even pointer">
		                	<div>
		                		<input type="hidden" name="currFileId[]" class="currFile" value="{{ $entry->IdArchivoEntrada }}">			                    
			                    <td class=" ">{{$entry->IdArchivoEntrada}}</td>
			                    <td class=" ">{{$entry->original_filename}}</td>
			                    <td class=" ">
			                      <a href="{{route('getDownload.evidences', $entry->filename)}}" class="">
                              <li style="margin-left:12px">
                                <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                                <span class="glyphicon-class">{{$entry->original_filename}}</span>
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
@endsection