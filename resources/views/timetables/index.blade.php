@extends('app')
@section('content')
          <div class="page-title">
            <div class="title_left">
              <h3>Timetables</h3>
            </div>
            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Buscar">
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                        </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">
				          <div class="clearfix"></div>
                  <div class="row">
                  	<div class="col-md-12 col-sm-12 col-xs-12">
                  		<a href="{{ route('create.timetable') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> New Timetable</a>
                  	</div>
                	</div>
                	<div class="clearfix"></div>
                  <div class="row">
                    <h3>Informatic Engineering</h3>
                    <table class="table table-striped responsive-utilities jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th>
                            <input type="checkbox" id="check-all" class="flat">
                          </th>
                          <th class="column-title">Code</th>
                          <th class="column-title">Status</th>
                          <th class="column-title last">Actions</th>
                          </th>
                          <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="odd pointer">
                          <td class="a-center ">
                            <input type="checkbox" class="flat" name="table_records">
                          </td>
                          <td class=" ">H0222</td>
                          <td class=" "><span class="label label-success">Active</span></td>
                          <td class=" ">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-search"></i></a>
                            <a href="{{ route('edit.faculty') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-remove"></i></a>
                          </td>
                          </td>
                        </tr>
                        <tr class="even pointer">
                          <td class="a-center ">
                            <input type="checkbox" class="flat" name="table_records">
                          </td>
                          <td class=" ">H0222</td>
                          <td class=" "><span class="label label-success">Active</span></td>
                          <td class=" ">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-search"></i></a>
                            <a href="{{ route('edit.faculty') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-remove"></i></a>
                          </td>
                          </td>
                        </tr>
                        <tr class="odd pointer">
                          <td class="a-center ">
                            <input type="checkbox" class="flat" name="table_records">
                          </td>
                          <td class=" ">H0222</td>
                          <td class=" "><span class="label label-success">Active</span></td>
                          <td class=" ">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-search"></i></a>
                            <a href="{{ route('edit.faculty') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-remove"></i></a>
                          </td>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="clearfix"></div>
                  <div class="row">
                    <h3>Electronics Engineering</h3>
                    <table class="table table-striped responsive-utilities jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th>
                            <input type="checkbox" id="check-all" class="flat">
                          </th>
                          <th class="column-title">Code</th>
                          <th class="column-title">Status</th>
                          <th class="column-title last">Actions</th>
                          </th>
                          <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="odd pointer">
                          <td class="a-center ">
                            <input type="checkbox" class="flat" name="table_records">
                          </td>
                          <td class=" ">H0222</td>
                          <td class=" "><span class="label label-success">Active</span></td>
                          <td class=" ">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-search"></i></a>
                            <a href="{{ route('edit.faculty') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-remove"></i></a>
                          </td>
                          </td>
                        </tr>
                        <tr class="even pointer">
                          <td class="a-center ">
                            <input type="checkbox" class="flat" name="table_records">
                          </td>
                          <td class=" ">H0222</td>
                          <td class=" "><span class="label label-success">Active</span></td>
                          <td class=" ">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-search"></i></a>
                            <a href="{{ route('edit.faculty') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-remove"></i></a>
                          </td>
                          </td>
                        </tr>
                        <tr class="odd pointer">
                          <td class="a-center ">
                            <input type="checkbox" class="flat" name="table_records">
                          </td>
                          <td class=" ">H0222</td>
                          <td class=" "><span class="label label-success">Active</span></td>
                          <td class=" ">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-search"></i></a>
                            <a href="{{ route('edit.faculty') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-remove"></i></a>
                          </td>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="clearfix"></div>
                  <div class="row">
                    <h3>Civil Engineering</h3>
                    <table class="table table-striped responsive-utilities jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th>
                            <input type="checkbox" id="check-all" class="flat">
                          </th>
                          <th class="column-title">Code</th>
                          <th class="column-title">Status</th>
                          <th class="column-title last">Actions</th>
                          </th>
                          <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="odd pointer">
                          <td class="a-center ">
                            <input type="checkbox" class="flat" name="table_records">
                          </td>
                          <td class=" ">H0222</td>
                          <td class=" "><span class="label label-success">Active</span></td>
                          <td class=" ">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-search"></i></a>
                            <a href="{{ route('edit.faculty') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-remove"></i></a>
                          </td>
                          </td>
                        </tr>
                        <tr class="even pointer">
                          <td class="a-center ">
                            <input type="checkbox" class="flat" name="table_records">
                          </td>
                          <td class=" ">H0222</td>
                          <td class=" "><span class="label label-success">Active</span></td>
                          <td class=" ">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-search"></i></a>
                            <a href="{{ route('edit.faculty') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-remove"></i></a>
                          </td>
                          </td>
                        </tr>
                        <tr class="odd pointer">
                          <td class="a-center ">
                            <input type="checkbox" class="flat" name="table_records">
                          </td>
                          <td class=" ">H0222</td>
                          <td class=" "><span class="label label-success">Active</span></td>
                          <td class=" ">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-search"></i></a>
                            <a href="{{ route('edit.faculty') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-remove"></i></a>
                          </td>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
@include('modals.delete-modal', ['message' => 'Do you want to delete this timetable?', 'action' => '#', 'button' => 'Delete'])
@include('faculty.view-modal', ['title' => 'Timetable Register'])
@endsection