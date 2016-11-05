@extends('app')
@section('content')
<ul class="tabs-page">    
    <div class="tab-page-wrapper active">
        <li class="tab-page">Citas</li>
    </div>    
    <a href="">
        <div class="tab-page-wrapper">
            <li class="tab-page">Citas por tutor</li>
        </div>
    </a>
    <a href="">
        <div class="tab-page-wrapper">
            <li class="tab-page">Citas por alumno</li>
        </div>
    </a>
    <a href="">
        <div class="tab-page-wrapper">
            <li class="tab-page">Reasignación de tutores</li>
        </div>
    </a>
</ul>

<div class="tab-content-container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">General</h3>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection