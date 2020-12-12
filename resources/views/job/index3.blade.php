@extends('layouts.app')
@section('parentPageTitle', 'HRMS')
@section('title', 'Dashboard')


@section('content')
<div class="section-body mt-3">
    <div class="container-fluid">                
        <div class="row clearfix row-deck">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Top Locations</h3>
                        <div class="card-options">
                            <a href="javascript:void(0)" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                            <div class="item-action dropdown ml-2">
                                <a href="javascript:void(0)" data-toggle="dropdown"><i class="fe fe-more-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>                                            
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-copy"></i> Copy to</a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-folder"></i> Move to</a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-edit"></i> Rename</a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-trash"></i> Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="world-map-markers" class="jvector-map" style="height: 300px;"></div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-xl-4 col-md-12">
                                <div class="clearfix">
                                    <div class="float-left"><strong>35%</strong></div>
                                    <div class="float-right"><small class="text-muted">2018</small></div>
                                </div>
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-gray" role="progressbar" style="width: 35%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="text-uppercase font-10">USA</span>
                            </div>
                            <div class="col-xl-4 col-md-12">
                                <div class="clearfix">
                                    <div class="float-left"><strong>61%</strong></div>
                                    <div class="float-right"><small class="text-muted">2018</small></div>
                                </div>
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-gray" role="progressbar" style="width: 61%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="text-uppercase font-10">India</span>
                            </div>
                            <div class="col-xl-4 col-md-12">
                                <div class="clearfix">
                                    <div class="float-left"><strong>37%</strong></div>
                                    <div class="float-right"><small class="text-muted">2018</small></div>
                                </div>
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-gray" role="progressbar" style="width: 37%" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="text-uppercase font-10">Australia</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Job View</h3>
                        <div class="card-options">
                            <a href="javascript:void(0)" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                            <div class="item-action dropdown ml-2">
                                <a href="javascript:void(0)" data-toggle="dropdown"><i class="fe fe-more-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>                                            
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-copy"></i> Copy to</a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-folder"></i> Move to</a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-edit"></i> Rename</a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-trash"></i> Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-lg-4 col-sm-12 border-right">
                                <label class="mb-0 font-10">All Time</label>
                                <h4 class="font-20 font-weight-bold">2,025</h4>
                            </div>
                            <div class="col-lg-4 col-sm-12 border-right">
                                <label class="mb-0 font-10">Last Month</label>
                                <h4 class="font-20 font-weight-bold">754</h4>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <label class="mb-0 font-10">Today</label>
                                <h4 class="font-20 font-weight-bold">54</h4>
                            </div>
                        </div>
                        <table class="table table-striped mt-4">
                            <tr>
                                <td>
                                    <label class="d-block">Biology - BIO <span class="float-right">43%</span></label>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar bg-lightgray" role="progressbar" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100" style="width: 43%;"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="d-block">Business Analysis - BUS <span class="float-right">27%</span></label>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar bg-lightgray" role="progressbar" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100" style="width: 27%;"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="d-block">Computer Technology - CT <span class="float-right">81%</span></label>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar bg-lightgray" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 81%;"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="d-block">Management - MGT <span class="float-right">61%</span></label>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar bg-lightgray" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 61%;"></div>
                                    </div>   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="d-block">Angular Dev <span class="float-right">77%</span></label>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar bg-lightgray" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                                    </div>   
                                </td>
                            </tr>
                        </table> 
                    </div>
                    <div class="card-footer">
                        <small>Measure How Fast You’re Growing Monthly Recurring Revenue. <a href="#">Learn More</a></small>
                    </div>
                </div>            
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Current job Openings</h3>
                        <div class="card-options">
                            <a href="javascript:void(0)" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                            <div class="item-action dropdown ml-2">
                                <a href="javascript:void(0)" data-toggle="dropdown"><i class="fe fe-more-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>                                            
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-copy"></i> Copy to</a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-folder"></i> Move to</a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-edit"></i> Rename</a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-trash"></i> Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter table_custom spacing5 mb-0">
                                <tbody>
                                    <tr>
                                        <td class="w40">
                                            <i class="flag flag-us" data-toggle="tooltip" title="" data-original-title="flag flag-us"></i>
                                        </td>
                                        <td>
                                            <small>United States</small>
                                            <h5 class="mb-0">434</h5>
                                        </td>
                                        <td>
                                            <span class="chart">5,3,7,8,6,1,4,9</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="flag flag-au" data-toggle="tooltip" title="" data-original-title="flag flag-au"></i>
                                        </td>
                                        <td>
                                            <small>Australia</small>
                                            <h5 class="mb-0">215</h5>
                                        </td>
                                        <td>
                                            <span class="chart">4,2,2,5,6,9,8,1</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="flag flag-ca" data-toggle="tooltip" title="" data-original-title="flag flag-ca"></i>
                                        </td>
                                        <td>
                                            <small>Canada</small>
                                            <h5 class="mb-0">105</h5>
                                        </td>
                                        <td>
                                            <span class="chart">7,5,3,9,5,1,4,6</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="flag flag-gb" data-toggle="tooltip" title="" data-original-title="flag flag-gb"></i>
                                        </td>
                                        <td>
                                            <small>United Kingdom</small>
                                            <h5 class="mb-0">250</h5>
                                        </td>
                                        <td>
                                            <span class="chart">3,5,6,4,9,5,5,2</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="flag flag-nl" data-toggle="tooltip" title="" data-original-title="flag flag-nl"></i>
                                        </td>
                                        <td>
                                            <small>Netherlands</small>
                                            <h5 class="mb-0">52</h5>
                                        </td>
                                        <td>
                                            <span class="chart">8,2,1,5,6,3,4,9</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small>Measure How Fast You’re Growing Monthly Recurring Revenue. <a href="#">Learn More</a></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix row-deck">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Applicants</h3>
                        <div class="card-options">
                            <a href="javascript:void(0)" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                            <div class="item-action dropdown ml-2">
                                <a href="javascript:void(0)" data-toggle="dropdown"><i class="fe fe-more-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>                                            
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-copy"></i> Copy to</a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-folder"></i> Move to</a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-edit"></i> Rename</a>
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-trash"></i> Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-vcenter mb-0">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Apply for</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="w60">
                                            <div class="avtar-pic w35 bg-red" data-toggle="tooltip" data-placement="top" title="Avatar Name"><span>MN</span></div>
                                        </td>
                                        <td>
                                            <div class="font-15">Marshall Nichols</div>
                                            <span class="text-muted">marshall-n@gmail.com</span>
                                        </td>
                                        <td><span>Full-stack developer</span></td>
                                        <td>24 Jun, 2015</td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-info btn-round">Interview</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w60">
                                            <img src="../assets/images/xs/avatar1.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded">
                                        </td>
                                        <td>
                                            <div class="font-15">Susie Willis</div>
                                            <span class="text-muted">sussie-w@gmail.com</span>
                                        </td>
                                        <td><span>Designer</span></td>
                                        <td>28 Jun, 2015</td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-info btn-round">Interview</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w60">
                                            <div class="avtar-pic w35 bg-pink" data-toggle="tooltip" data-placement="top" title="Avatar Name"><span>MN</span></div>
                                        </td>
                                        <td>
                                            <div class="font-15">Debra Stewart</div>
                                            <span class="text-muted">debra@gmail.com</span>
                                        </td>
                                        <td><span>Project Manager</span></td>
                                        <td>21 July, 2015</td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-danger btn-round">Cancel</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w60">
                                            <img src="../assets/images/xs/avatar2.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded">
                                        </td>
                                        <td>
                                            <div class="font-15">Francisco Vasquez</div>
                                            <span class="text-muted">francisv@gmail.com</span>
                                        </td>
                                        <td><span>Senior Developer</span></td>
                                        <td>18 Jan, 2016</td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-info btn-round">Interview</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w60">
                                            <img src="../assets/images/xs/avatar3.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded">
                                        </td>
                                        <td>
                                            <div class="font-15">Jane Hunt</div>
                                            <span class="text-muted">jane-hunt@gmail.com</span>
                                        </td>
                                        <td><span>Front-end Developer</span></td>
                                        <td>08 Mar, 2016</td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-success btn-round">Interviewed</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body text-center d-flex align-items-center justify-content-center">
                        <div style="max-width: 340px;">
                            <img src="../assets/images/we-released.svg" alt="..." class="img-fluid mb-4 mt-4" style="max-width: 272px;">
                            <h5 class="mb-2">We released Bootstrap 4x versions of our theme.</h5>
                            <p class="text-muted">This is a true story and totally not made up. This is going to be better in the long run but for now this is the way it is.</p>
                            <a href="#!" class="btn btn-primary">Try it for free</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>            
</div>
@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/charts-c3/c3.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/jvectormap/jvectormap-2.0.3.css') }}">
@stop

@section('page-script')
<script src="{{ asset('assets/bundles/counterup.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/jvectormap1.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/c3.bundle.js') }}"></script>

<script src="{{ asset('assets/js/core.js') }}"></script>
<script src="{{ asset('assets/js/page/job-index.js') }}"></script>
@stop
