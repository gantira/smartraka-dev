@extends('layouts.app')
@section('title', 'Calendar')


@section('content')
<div class="section-body mt-3">
    <div class="container-fluid">
        <div class="row clearfix row-deck">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Events List</h3>
                        <div id="event-list" class="fc event_list">
                            <div class='fc-event bg-primary' data-class="bg-primary">My Event 1</div>
                            <div class='fc-event bg-info' data-class="bg-info">Birthday Party</div>
                            <div class='fc-event bg-success' data-class="bg-success">Meeting</div>
                            <div class='fc-event bg-warning' data-class="bg-warning">Conference</div>
                            <div class='fc-event bg-danger' data-class="bg-danger">My Event 5</div>
                        </div>
                        <div class="todo_list mt-4">
                            <h3 class="card-title">ToDo List <small>This Month task list</small></h3>
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="">
                                        <span class="custom-control-label">Report Panel Usag</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                        <span class="custom-control-label">Report Panel Usag</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="">
                                        <span class="custom-control-label">New logo design for Angular Admin</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                        <span class="custom-control-label">Design PSD files for Angular Admin</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>                            
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-header bline">
                        <h3 class="card-title">Sara Hopkins</h3>
                        <div class="card-options">
                            <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('popup')
<!-- Add New Event popup -->
<div class="modal fade" id="addNewEvent" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Add</strong> an event</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="control-label">Event Name</label>
                            <input class="form-control" placeholder="Enter name" type="text" name="category-name">
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Choose Event Color</label>
                            <select class="form-control" data-placeholder="Choose a color..." name="category-color">
                                <option value="success">Success</option>
                                <option value="danger">Danger</option>
                                <option value="info">Info</option>
                                <option value="primary">Primary</option>
                                <option value="warning">Warning</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success save-event" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Add Direct Event popup -->
<div class="modal fade" id="addDirectEvent" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Direct Event</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Event Name</label>
                            <input class="form-control" name="event-name" type="text" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Event Type</label>
                            <select name="event-bg" class="form-control">
                                <option value="success">Success</option>
                                <option value="danger">Danger</option>
                                <option value="info">Info</option>
                                <option value="primary">Primary</option>
                                <option value="warning">Warning</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn save-btn btn-success">Save</button>
                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Event Edit Modal popup -->
<div class="modal fade" id="eventEditModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Event</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Event Name</label>
                            <input class="form-control" name="event-name" type="text" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Event Type</label>
                            <select name="event-bg" class="form-control">
                                <option value="success">Success</option>
                                <option value="danger">Danger</option>
                                <option value="info">Info</option>
                                <option value="primary">Primary</option>
                                <option value="warning">Warning</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn mr-auto delete-btn btn-danger">Delete</button>
                <button class="btn save-btn btn-success">Save</button>
                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/fullcalendar/fullcalendar.min.css') }}">
@stop

@section('page-script')
<script src="{{ asset('assets/bundles/fullcalendar.bundle.js') }}"></script>

<script src="{{ asset('assets/js/core.js') }}"></script>
<script src="{{ asset('assets/js/page/calendar.js') }}"></script>
@stop
