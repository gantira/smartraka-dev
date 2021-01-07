@extends('layouts.app')
@section('parentPageTitle', 'HRMS')
@section('title', 'Users')


@section('content')
    <div class="section-body">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <ul class="nav nav-tabs page-header-tab">
                    <li class="nav-item"><a class="nav-link active" id="user-tab" data-toggle="tab" href="#user-list">List</a></li>
                    <li class="nav-item"><a class="nav-link" id="user-tab" data-toggle="tab" href="#user-add">Add New</a></li>
                </ul>
                <div class="header-action">
                    <button type="button" class="btn btn-primary"><i class="fe fe-plus mr-2"></i>Add</button>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body mt-3">
        <div class="container-fluid">
            <div class="tab-content mt-3">
                <div class="tab-pane fade show active" id="user-list" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User List</h3>
                            <div class="card-options">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm" placeholder="Cari..." name="s">
                                        <span class="input-group-btn ml-2"><button class="btn btn-sm btn-default" type="submit"><span class="fe fe-search"></span></button></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-vcenter text-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th class="w60">Name</th>
                                            <th></th>
                                            <th></th>
                                            <th>Created Date</th>
                                            <th>Role</th>
                                            <th class="w100">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="width45">
                                                <span class="avatar avatar-blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name">NG</span>
                                            </td>
                                            <td>
                                                <h6 class="mb-0">Marshall Nichols</h6>
                                                <span>marshall-n@gmail.com</span>
                                            </td>
                                            <td><span class="tag tag-danger">Super Admin</span></td>
                                            <td>24 Jun, 2015</td>
                                            <td>CEO and Founder</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../assets/images/xs/avatar1.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="avatar" data-original-title="Avatar Name">
                                            </td>
                                            <td>
                                                <h6 class="mb-0">Susie Willis</h6>
                                                <span>sussie-w@gmail.com</span>
                                            </td>
                                            <td><span class="tag tag-info">Admin</span></td>
                                            <td>28 Jun, 2015</td>
                                            <td>Team Lead</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../assets/images/xs/avatar2.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="avatar" data-original-title="Avatar Name">
                                            </td>
                                            <td>
                                                <h6 class="mb-0">Debra Stewart</h6>
                                                <span>debra@gmail.com</span>
                                            </td>
                                            <td><span class="tag tag-default">Employee</span></td>
                                            <td>21 July, 2015</td>
                                            <td>Team Lead</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="avatar avatar-green" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name">KH</span>                                                    
                                            </td>
                                            <td>
                                                <h6 class="mb-0">Erin Gonzales</h6>
                                                <span>Erinonzales@gmail.com</span>
                                            </td>
                                            <td><span class="tag tag-default">Employee</span></td>
                                            <td>21 July, 2015</td>
                                            <td>Web Developer</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../assets/images/xs/avatar3.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="avatar" data-original-title="Avatar Name">
                                            </td>
                                            <td>
                                                <h6 class="mb-0">Susie Willis</h6>
                                                <span>sussie-w@gmail.com</span>
                                            </td>
                                            <td><span class="tag tag-info">Admin</span></td>
                                            <td>28 Jun, 2015</td>
                                            <td>Team Lead</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../assets/images/xs/avatar4.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="avatar" data-original-title="Avatar Name">
                                            </td>
                                            <td>
                                                <h6 class="mb-0">Debra Stewart</h6>
                                                <span>debra@gmail.com</span>
                                            </td>
                                            <td><span class="tag tag-default">Employee</span></td>
                                            <td>21 July, 2015</td>
                                            <td>Team Lead</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../assets/images/xs/avatar5.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="avatar" data-original-title="Avatar Name">
                                            </td>
                                            <td>
                                                <h6 class="mb-0">Erin Gonzales</h6>
                                                <span>Erinonzales@gmail.com</span>
                                            </td>
                                            <td><span class="tag tag-default">Employee</span></td>
                                            <td>21 July, 2016</td>
                                            <td>Web Developer</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../assets/images/xs/avatar6.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="avatar" data-original-title="Avatar Name">
                                            </td>
                                            <td>
                                                <h6 class="mb-0">Ava Alexander</h6>
                                                <span>alexander@gmail.com</span>
                                            </td>
                                            <td><span class="tag tag-success">HR Admin</span></td>
                                            <td>21 July, 2016</td>
                                            <td>HR</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="avatar avatar-green" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name">KH</span>
                                            </td>
                                            <td>
                                                <h6 class="mb-0">Ava Alexander</h6>
                                                <span>alexander@gmail.com</span>
                                            </td>
                                            <td><span class="tag tag-success">HR Admin</span></td>
                                            <td>21 July, 2019</td>
                                            <td>HR</td>
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
                <div class="tab-pane fade" id="user-add" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Employee ID *">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="First Name *">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Email ID *">
                                    </div>
                                </div>                                    
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Mobile No">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <select class="form-control show-tick">
                                            <option>Select Role Type</option>
                                            <option>Super Admin</option>
                                            <option>Admin</option>
                                            <option>Employee</option>
                                        </select>
                                    </div>
                                </div>                           
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">                                   
                                        <input type="text" class="form-control" placeholder="Username *">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Confirm Password">
                                    </div>
                                </div>                                    

                                <div class="col-12">
                                    <hr class="mt-4">
                                    <h6>Module Permission</h6>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Read</th>
                                                    <th>Write</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Super Admin</td>
                                                    <td>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="">
                                                            <span class="custom-control-label">&nbsp;</span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="">
                                                            <span class="custom-control-label">&nbsp;</span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="">
                                                            <span class="custom-control-label">&nbsp;</span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Admin</td>
                                                    <td>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="">
                                                            <span class="custom-control-label">&nbsp;</span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                            <span class="custom-control-label">&nbsp;</span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                            <span class="custom-control-label">&nbsp;</span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Employee</td>
                                                    <td>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="">
                                                            <span class="custom-control-label">&nbsp;</span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                            <span class="custom-control-label">&nbsp;</span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                            <span class="custom-control-label">&nbsp;</span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>HR Admin</td>
                                                    <td>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1"  checked="">
                                                            <span class="custom-control-label">&nbsp;</span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="">
                                                            <span class="custom-control-label">&nbsp;</span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="">
                                                            <span class="custom-control-label">&nbsp;</span>
                                                        </label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="button" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
