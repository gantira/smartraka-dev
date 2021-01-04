@section('title')
    Dashboard
@endsection

<div>
    <div class="section-body mt-3">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="mb-4">
                        <h4>Welcome {{ auth()->user()->name }}!</h4>
                        <small>Measure How Fast You’re Growing Monthly Recurring Revenue. <a href="#">Learn More</a></small>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-6 col-md-4 col-xl-3">
                    <div class="card">
                        <div class="card-body ribbon">
                            <div class="ribbon-box green">{{ $user }}</div>
                            <a href="#" class="my_sort_cut text-muted">
                                <i class="icon-users"></i>
                                <span>Users</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <a href="#" class="my_sort_cut text-muted">
                                <i class="icon-folder-alt"></i>
                                <span>{{ $document }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-xl-3">
                    <div class="card">
                        <div class="card-body ribbon">
                            <div class="ribbon-box orange">{{ rupiah($balance, 2) }}</div>
                            <a href="#" class="my_sort_cut text-muted">
                                <i class="icon-handbag"></i>
                                <span>Laba</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-xl-3">
                    <div class="card">
                        <div class="card-body ribbon">
                            <div class="ribbon-box orange">{{ rupiah($sof, 2) }}</div>
                            <a href="#" class="my_sort_cut text-muted">
                                <i class="icon-diamond"></i>
                                <span>Pengajuan Dana</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="container-fluid">
            <div class="row clearfix row-deck">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Statistics</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Dokumen</th>
                                            <th>Total Terjual</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($product as $label => $total)
                                        <tr>
                                            <td>{{ $label }}</td>
                                            <td>{{ $total }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="2" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
        </div>
    </div>
</div>

@section('page-styles')

@stop

@section('page-script')
    <script src="{{ asset('assets/bundles/apexcharts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/counterup.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/knobjs.bundle.js') }}"></script>

    <script src="{{ asset('assets/js/core.js') }}"></script>
    <script src="{{ asset('assets/js/page/index.js') }}"></script>
@stop
