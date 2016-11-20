@extends('app')
@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>{{ $title }}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">

                    <div class="form-horizontal">
                        <div class="row" style="margin-top: 10px;margin-bottom: 10px;">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Periodo </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label for="middle-name" class="control-label col-md-7 col-xs-12">
                                    @if($period != null)
                                        {{ $period->cycleAcademicStart->Descripcion }} al {{ $period->cycleAcademicEnd->Descripcion }}
                                    @else
                                        Debe iniciar un nuevo periodo.
                                    @endif
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection