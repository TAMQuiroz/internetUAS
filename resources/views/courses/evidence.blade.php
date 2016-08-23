@extends('app')
@section('content')

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3> Evidencia del Curso</h3>
            </div>

            <div class="title_right">
              
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Subido por: </h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <p>
                  Arratra tus archivos aqui o usa tu manejador de archivos local</p>
                  <form action="choices/form_upload.html" class="dropzone" style="border: 1px solid #e5e5e5; height: 300px; "></form>

                  <br />
                  <br />
                  <br />
                  <br />
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
                  <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                      <tr class="headings">
                        <th>
                          <input type="checkbox" id="check-all" class="flat">
                        </th>
                        <th class="column-title">Codigo </th>
                        <th class="column-title">Ruta del Archivo </th>
                        <th class="column-title last">Acciones</th>
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr class="even pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td class=" ">0001</td>
                        <td class=" ">../documentos_del_curso/documento_1.pdf</td>
                        <td class=" ">
                          <a href="#" class="btn btn-danger btn-xs">Borrar</a>
                        </td>
                        </td>
                      </tr>
                      <tr class="even pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td class=" ">0002</td>
                        <td class=" ">../documentos_del_curso/documento_2.pdf</td>
                        <td class=" ">
                          <a href="#" class="btn btn-danger btn-xs">Borrar</a>
                        </td>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>         
        </div>
@endsection