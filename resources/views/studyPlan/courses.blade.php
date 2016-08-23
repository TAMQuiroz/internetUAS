@if(isset($semester_id))
@foreach($courses_grouped as $academic => $group)
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                @if($academic != -1 )
                    <h2>Nivel {{ $academic }}</h2>
                @else
                    <h2>Electivos</h2>
                @endif
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        @foreach($group as $course)
                        <tr>
                            <td class="col-md-2">{{ $course->Codigo }}</td>
                            <td class="col-md-8">{{ $course->Nombre }}</td>
                            <td class="text-center col-md-2">
                                <a class="btn btn-primary btn-xs" href="{{ route('view.studyPlan', ['course_id' => $course->IdCurso, 'semester' => $semester_id]) }}"><i class="fa fa-search"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif