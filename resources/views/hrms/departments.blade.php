@extends('layouts.app')
@section('title', 'Departments')


@section('content')
    <div class="section-body">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <ul class="nav nav-tabs page-header-tab">
                    <li class="nav-item"><a class="nav-link active" id="Departments-tab" data-toggle="tab" href="#Departments-list">List View</a></li>
                    <li class="nav-item"><a class="nav-link" id="Departments-tab" data-toggle="tab" href="#Departments-grid">Grid View</a></li>
                </ul>
                <div class="header-action">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fe fe-plus mr-2"></i>Add</button>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body mt-3">
        <div class="container-fluid">
            <div class="tab-content mt-3">
                <div class="tab-pane fade show active" id="Departments-list" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Departments List</h3>
                            <div class="card-options">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm" placeholder="Search something..." name="s">
                                        <span class="input-group-btn ml-2"><button class="btn btn-icon" type="submit"><span class="fe fe-search"></span></button></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-vcenter table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Department Name</th>
                                            <th>Department Head</th>
                                            <th>Total Employee</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td><div class="font-15">Web Development</div></td>
                                            <td>John Smith</td>
                                            <td>102</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>02</td>
                                            <td><div class="font-15">Marketing</div></td>
                                            <td>Maryam Amiri</td>
                                            <td>13</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>03</td>
                                            <td><div class="font-15">App Development</div></td>
                                            <td>Frank Camly</td>
                                            <td>21</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>04</td>
                                            <td><div class="font-15">Support</div></td>
                                            <td>Gary Camara</td>
                                            <td>84</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>05</td>
                                            <td><div class="font-15">Accounts</div></td>
                                            <td>Fidel Tonn</td>
                                            <td>11</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>06</td>
                                            <td><div class="font-15">PHP Open Source</div></td>
                                            <td>Maryam Amiri</td>
                                            <td>37</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>07</td>
                                            <td><div class="font-15">Design and Printing</div></td>
                                            <td>Maryam Amiri</td>
                                            <td>17</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="Departments-grid" role="tabpanel">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img class="img-thumbnail rounded-circle avatar-xxl" src="../assets/images/sm/avatar1.jpg" alt="">
                                    <h6 class="mt-3">John Smith</h6>
                                    <div class="text-center text-muted mb-3">Web Development</div>
                                    <button type="button" class="btn btn-icon btn-sm btn-outline-primary"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-icon btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="row clearfix">
                                        <div class="col-6">
                                            <h5 class="mb-0">105</h5>
                                            <div class="text-muted">Employee</div>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="mb-0">$3100</h5>
                                            <div class="text-muted">Earnings</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img class="img-thumbnail rounded-circle avatar-xxl" src="../assets/images/sm/avatar2.jpg" alt="">
                                    <h6 class="mt-3">Maryam Amiri</h6>
                                    <div class="text-center text-muted mb-3">Web Development</div>
                                    <button type="button" class="btn btn-icon btn-sm btn-outline-primary"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-icon btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="row clearfix">
                                        <div class="col-6">
                                            <h5 class="mb-0">105</h5>
                                            <div class="text-muted">Employee</div>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="mb-0">$3100</h5>
                                            <div class="text-muted">Earnings</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img class="img-thumbnail rounded-circle avatar-xxl" src="../assets/images/sm/avatar3.jpg" alt="">
                                    <h6 class="mt-3">Fidel Tonn</h6>
                                    <div class="text-center text-muted mb-3">Web Development</div>
                                    <button type="button" class="btn btn-icon btn-sm btn-outline-primary"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-icon btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="row clearfix">
                                        <div class="col-6">
                                            <h5 class="mb-0">12</h5>
                                            <div class="text-muted">Employee</div>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="mb-0">$1800</h5>
                                            <div class="text-muted">Earnings</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img class="img-thumbnail rounded-circle avatar-xxl" src="../assets/images/sm/avatar4.jpg" alt="">
                                    <h6 class="mt-3">Frank Camly</h6>
                                    <div class="text-center text-muted mb-3">Web Development</div>
                                    <button type="button" class="btn btn-icon btn-sm btn-outline-primary"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-icon btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="row clearfix">
                                        <div class="col-6">
                                            <h5 class="mb-0">105</h5>
                                            <div class="text-muted">Employee</div>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="mb-0">$3100</h5>
                                            <div class="text-muted">Earnings</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img class="img-thumbnail rounded-circle avatar-xxl" src="../assets/images/sm/avatar2.jpg" alt="">
                                    <h6 class="mt-3">Maryam Amiri</h6>
                                    <div class="text-center text-muted mb-3">Web Development</div>
                                    <button type="button" class="btn btn-icon btn-sm btn-outline-primary"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-icon btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="row clearfix">
                                        <div class="col-6">
                                            <h5 class="mb-0">105</h5>
                                            <div class="text-muted">Employee</div>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="mb-0">$3100</h5>
                                            <div class="text-muted">Earnings</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img class="img-thumbnail rounded-circle avatar-xxl" src="../assets/images/sm/avatar1.jpg" alt="">
                                    <h6 class="mt-3">John Smith</h6>
                                    <div class="text-center text-muted mb-3">Web Development</div>
                                    <button type="button" class="btn btn-icon btn-sm btn-outline-primary"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-icon btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="row clearfix">
                                        <div class="col-6">
                                            <h5 class="mb-0">55</h5>
                                            <div class="text-muted">Employee</div>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="mb-0">$12,024</h5>
                                            <div class="text-muted">Earnings</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img class="img-thumbnail rounded-circle avatar-xxl" src="../assets/images/sm/avatar2.jpg" alt="">
                                    <h6 class="mt-3">Maryam Amiri</h6>
                                    <div class="text-center text-muted mb-3">Web Development</div>
                                    <button type="button" class="btn btn-icon btn-sm btn-outline-primary"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-icon btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="row clearfix">
                                        <div class="col-6">
                                            <h5 class="mb-0">23</h5>
                                            <div class="text-muted">Employee</div>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="mb-0">$5210</h5>
                                            <div class="text-muted">Earnings</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    </div>
@stop

@section('popup')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Departments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Departments Name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Departments Head">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="No of Employee">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert/sweetalert.css') }}">
@stop

@section('page-script')
<script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}"></script>

<script src="{{ asset('assets/js/core.js') }}"></script>
<script src="{{ asset('assets/js/page/dialogs.js') }}"></script>
@stop
