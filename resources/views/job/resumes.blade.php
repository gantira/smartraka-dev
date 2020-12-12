@extends('layouts.app')
@section('title', 'Resumes')


@section('content')
<div class="section-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <ul class="nav nav-tabs page-header-tab">
                <li class="nav-item"><a class="nav-link active" id="Resumes-tab" data-toggle="tab" href="#Resumes-list">List View</a></li>
                <li class="nav-item"><a class="nav-link" id="Resumes-tab" data-toggle="tab" href="#Resumes-grid">Grid View</a></li>
            </ul>
            <div class="header-action d-md-flex">
                <div class="input-group mr-2">
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
                <button type="button" class="btn btn-primary"><i class="fe fe-plus mr-2"></i>Add</button>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label>Search</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label>Hourly Rate</label>
                                <div class="multiselect_div">
                                    <select id="multiselect3-all" name="multiselect3[]" class="multiselect multiselect-custom" multiple="multiple">
                                        <option value="multiselect-all">All rates</option>
                                        <option value="1">$0 - $50</option>
                                        <option value="2">$50 - $100</option>
                                        <option value="3">$100 - $200</option>
                                        <option value="4">$200 - $500</option>
                                        <option value="5">$500 +</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <label>Academic Degree</label>
                                <div class="form-group">
                                    <select class="custom-select">
                                        <option selected="">All degrees</option>
                                        <option value="1">Associate degree</option>
                                        <option value="2">Bachelor's degree</option>
                                        <option value="3">Master's degree</option>
                                        <option value="4">Doctoral degree</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <label>Order</label>
                                <div class="form-group">
                                    <select class="custom-select">
                                        <option selected="">Relevance</option>
                                        <option value="1">Highest rate first</option>
                                        <option value="2">Lowest rate first</option>
                                        <option value="3">Highest degree first</option>
                                        <option value="4">Lowest degree first</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <label>&nbsp;</label>
                                <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-block" title="">Filter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-body">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="Resumes-list" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-vcenter table_custom spacing5 border-style mb-0">
                        <thead>
                            <tr>
                                <th class="w40">#</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Address</th>
                                <th>Rate</th>
                                <th>Experience</th>
                                <th>Review</th>
                                <th class="w40"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <span class="avatar avatar-pink" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name">GH</span>
                                </td>
                                <td>Michelle Green</td>
                                <td>Web Developer</td>
                                <td><span>123 6th St. Melbourne, FL 32904</span></td>
                                <td>$34 per hour</td>
                                <td>2+ Year</td>
                                <td>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </td>
                                <td>
                                    <div class="item-action dropdown">
                                        <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(18px, 25px, 0px);">
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img class="avatar" src="../assets/images/xs/avatar1.jpg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name"/>
                                </td>
                                <td>Jason Porter</td>
                                <td>UI UX Designer</td>
                                <td><span>123 6th St. Melbourne, FL 32904</span></td>
                                <td>$61 per hour</td>
                                <td>5+ Year</td>
                                <td>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star"></i>
                                </td>
                                <td>
                                    <div class="item-action dropdown">
                                        <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(18px, 25px, 0px);">
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="avatar avatar-indigo" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name">KL</span>
                                </td>
                                <td>David Wallace</td>
                                <td>Java Developer</td>
                                <td><span>123 6th St. Melbourne, FL 32904</span></td>
                                <td>$76 per hour</td>
                                <td>7+ Year</td>
                                <td>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star"></i>
                                </td>
                                <td>
                                    <div class="item-action dropdown">
                                        <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(18px, 25px, 0px);">
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="avatar avatar-orange" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name">KL</span>
                                </td>
                                <td>David Wallace</td>
                                <td>Java Developer</td>
                                <td><span>123 6th St. Melbourne, FL 32904</span></td>
                                <td>$76 per hour</td>
                                <td>7+ Year</td>
                                <td>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                </td>
                                <td>
                                    <div class="item-action dropdown">
                                        <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(18px, 25px, 0px);">
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img class="avatar" src="../assets/images/xs/avatar3.jpg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name"/>
                                </td>
                                <td>Michelle Green</td>
                                <td>PHP</td>
                                <td><span>123 6th St. Melbourne, FL 32904</span></td>
                                <td>$29 per hour</td>
                                <td>4+ Year</td>
                                <td>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star"></i>
                                </td>
                                <td>
                                    <div class="item-action dropdown">
                                        <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(18px, 25px, 0px);">
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img class="avatar" src="../assets/images/xs/avatar4.jpg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name"/>
                                </td>
                                <td>Michelle Green</td>
                                <td>PHP</td>
                                <td><span>123 6th St. Melbourne, FL 32904</span></td>
                                <td>$29 per hour</td>
                                <td>4+ Year</td>
                                <td>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star"></i>
                                </td>
                                <td>
                                    <div class="item-action dropdown">
                                        <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(18px, 25px, 0px);">
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="avatar avatar-blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name">KL</span>
                                </td>
                                <td>David Wallace</td>
                                <td>Java Developer</td>
                                <td><span>123 6th St. Melbourne, FL 32904</span></td>
                                <td>$76 per hour</td>
                                <td>7+ Year</td>
                                <td>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </td>
                                <td>
                                    <div class="item-action dropdown">
                                        <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(18px, 25px, 0px);">
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img class="avatar" src="../assets/images/xs/avatar5.jpg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name"/>
                                </td>
                                <td>Michelle Green</td>
                                <td>PHP</td>
                                <td><span>123 6th St. Melbourne, FL 32904</span></td>
                                <td>$29 per hour</td>
                                <td>4+ Year</td>
                                <td>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star"></i>
                                </td>
                                <td>
                                    <div class="item-action dropdown">
                                        <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(18px, 25px, 0px);">
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img class="avatar" src="../assets/images/xs/avatar2.jpg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name"/>
                                </td>
                                <td>Michelle Green</td>
                                <td>PHP</td>
                                <td><span>123 6th St. Melbourne, FL 32904</span></td>
                                <td>$29 per hour</td>
                                <td>4+ Year</td>
                                <td>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star"></i>
                                </td>
                                <td>
                                    <div class="item-action dropdown">
                                        <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(18px, 25px, 0px);">
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="avatar avatar-green" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name">KL</span>
                                </td>
                                <td>David Wallace</td>
                                <td>Java Developer</td>
                                <td><span>123 6th St. Melbourne, FL 32904</span></td>
                                <td>$76 per hour</td>
                                <td>7+ Year</td>
                                <td>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                    <i class="fa fa-star text-orange"></i>
                                </td>
                                <td>
                                    <div class="item-action dropdown">
                                        <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(18px, 25px, 0px);">
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>                                    
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="Resumes-grid" role="tabpanel">
                <div class="row clearfix">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="body text-center p-4">
                                <img class="rounded-circle w100 img-thumbnail" src="../assets/images/sm/avatar1.jpg" alt="">
                                <h6 class="mt-3 mb-0">Michelle Green</h6>
                                <span>Web Developer</span>
                                <ul class="mt-3 mb-4 list-unstyled d-flex justify-content-center">
                                    <li><a class="p-3" target="_blank" href="#">Java</a></li>
                                    <li><a class="p-3" target="_blank" href="#">CSS</a></li>
                                    <li><a class="p-3" target="_blank" href="#">HTML</a></li>
                                </ul>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <div><i class="fa fa-dollar"></i> 55 / hour</div>
                                    <div><i class="fa fa-map-marker"></i> Akron, OH</div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="body text-center p-4">
                                <img class="rounded-circle w100 img-thumbnail" src="../assets/images/sm/avatar2.jpg" alt="">
                                <h6 class="mt-3 mb-0">Jason Porter</h6>
                                <span>Carol@info.com</span>
                                <ul class="mt-3 mb-4 list-unstyled d-flex justify-content-center">
                                    <li><a class="p-3" target="_blank" href="#">Creativity</a></li>
                                    <li><a class="p-3" target="_blank" href="#">UIUX</a></li>
                                </ul>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <div><i class="fa fa-dollar"></i> 55 / hour</div>
                                    <div><i class="fa fa-map-marker"></i> Akron, OH</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="body text-center p-4">
                                <img class="rounded-circle w100 img-thumbnail" src="../assets/images/sm/avatar3.jpg" alt="">
                                <h6 class="mt-3 mb-0">David Wallace</h6>
                                <span>Michelle@info.com</span>
                                <ul class="mt-3 mb-4 list-unstyled d-flex justify-content-center">
                                    <li><a class="p-3" target="_blank" href="#">Swift</a></li>
                                    <li><a class="p-3" target="_blank" href="#">Xcode</a></li>
                                    <li><a class="p-3" target="_blank" href="#">C#</a></li>
                                </ul>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <div><i class="fa fa-dollar"></i> 55 / hour</div>
                                    <div><i class="fa fa-map-marker"></i> Akron, OH</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="body text-center p-4">
                                <img class="rounded-circle w100 img-thumbnail" src="../assets/images/sm/avatar4.jpg" alt="">
                                <h6 class="mt-3 mb-0">Michelle Green</h6>
                                <span>jason-porter@info.com</span>
                                <ul class="mt-3 mb-4 list-unstyled d-flex justify-content-center">
                                    <li><a class="p-3" target="_blank" href="#">Android</a></li>
                                    <li><a class="p-3" target="_blank" href="#">Playstor</a></li>
                                    <li><a class="p-3" target="_blank" href="#">Perl</a></li>
                                </ul>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <div><i class="fa fa-dollar"></i> 55 / hour</div>
                                    <div><i class="fa fa-map-marker"></i> Akron, OH</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="body text-center p-4">
                                <img class="rounded-circle w100 img-thumbnail" src="../assets/images/sm/avatar5.jpg" alt="">
                                <h6 class="mt-3 mb-0">Michelle Green</h6>
                                <span>jason-porter@info.com</span>
                                <ul class="mt-3 mb-4 list-unstyled d-flex justify-content-center">
                                    <li><a class="p-3" target="_blank" href="#">Negotiation</a></li>
                                    <li><a class="p-3" target="_blank" href="#">Writing</a></li>
                                </ul>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <div><i class="fa fa-dollar"></i> 55 / hour</div>
                                    <div><i class="fa fa-map-marker"></i> Akron, OH</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="body text-center p-4">
                                <img class="rounded-circle w100 img-thumbnail" src="../assets/images/sm/avatar6.jpg" alt="">
                                <h6 class="mt-3 mb-0">Michelle Green</h6>
                                <span>jason-porter@info.com</span>
                                <ul class="mt-3 mb-4 list-unstyled d-flex justify-content-center">
                                    <li><a class="p-3" target="_blank" href="#">HTML</a></li>
                                    <li><a class="p-3" target="_blank" href="#">CSS</a></li>
                                    <li><a class="p-3" target="_blank" href="#">SCSS</a></li>
                                </ul>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <div><i class="fa fa-dollar"></i> 55 / hour</div>
                                    <div><i class="fa fa-map-marker"></i> Akron, OH</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="body text-center p-4">
                                <img class="rounded-circle w100 img-thumbnail" src="../assets/images/sm/avatar1.jpg" alt="">
                                <h6 class="mt-3 mb-0">Sean Black</h6>
                                <span>jason-porter@info.com</span>
                                <ul class="mt-3 mb-4 list-unstyled d-flex justify-content-center">
                                    <li><a class="p-3" target="_blank" href="#">PHP</a></li>
                                    <li><a class="p-3" target="_blank" href="#">Wordpress</a></li>
                                </ul>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <div><i class="fa fa-dollar"></i> 55 / hour</div>
                                    <div><i class="fa fa-map-marker"></i> Akron, OH</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="body text-center p-4">
                                <img class="rounded-circle w100 img-thumbnail" src="../assets/images/sm/avatar2.jpg" alt="">
                                <h6 class="mt-3 mb-0">David Wallace</h6>
                                <span>jason-porter@info.com</span>
                                <ul class="mt-3 mb-4 list-unstyled d-flex justify-content-center">
                                    <li><a class="p-3" target="_blank" href="#">C#</a></li>
                                    <li><a class="p-3" target="_blank" href="#">SQL Server</a></li>
                                    <li><a class="p-3" target="_blank" href="#">HTML</a></li>
                                </ul>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <div><i class="fa fa-dollar"></i> 55 / hour</div>
                                    <div><i class="fa fa-map-marker"></i> Akron, OH</div>
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

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-multiselect/bootstrap-multiselect.css') }}">
@stop

@section('page-script')
<script src="{{ asset('assets/plugins/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('assets/js/core.js') }}"></script>
<script>
$('#multiselect3-all').multiselect({
    includeSelectAllOption: true,
});
</script>
@stop
