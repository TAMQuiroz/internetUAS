@extends('app')
@section('content')
      <div class="page-title">
            <div class="title_left">
              <h3>{{ $title }}</h3>
            </div>
          <div class="clearfix"></div>
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">
                  <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <a class="btn btn-success pull-right" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Elegir un nuevo Curso</a>
                  </div>
                  </div>
                  <div class="clearfix"></div>
                  
                  <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                      <tr class="headings">
                        <th hidden class="column-title">IdCurso</th>
                        <th class="column-title">Codigo</th>
                        <th class="column-title">Nombre</th>
                        <th class="column-title">Resultado Estudiantil</th>
                        <th class="column-title last">Peso</th>
                        <th class="column-title last">Acción</th>
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    @if($pickedcourses!=null)
                      @foreach($pickedcourses as $course)
                      <tr class="even pointer view-course">
                        <td hidden class="courseid ">@if($course!=null) {{ $course->Idcurso }} @endif</td>
                        <td class="courseid ">@if($course!=null) {{ $course->Codigo }} @endif</td>
                        <td class="course-codigo ">@if($course!=null) {{ $course->Nombre }} @endif</td>
                        <td class="course-studentResult ">"Resultado Estudiantil"</td>
                        <td class="course-weight ">"Peso"</td>
                        <td class="course-actions ">
                          <a href="{{ route('edit.evaluatedCourses', ['courseCode' => $course->IdCurso]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                          <a href="" class="btn btn-danger btn-xs delete-evaluatedCourse" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-remove"></i></a>
                        </td>
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>

<script src="{{ URL::asset('js/intranetjs/courses/index-course-script.js')}}"></script>
@include('modals.delete-modal', ['message' => 'Esta seguro que desea eliminar este curso?'])
@include('courses.choose-modal', ['title' => 'Rubric #', 'courses' => $notPickedcourses])
@endsection 