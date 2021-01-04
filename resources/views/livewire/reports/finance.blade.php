@section('title')
    Laporan Keuangan
@endsection

<div>
    <div class="section-body">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <ul class="nav nav-tabs page-header-tab">
                    <li class="nav-item"><a class="nav-link active" id="user-tab" data-toggle="tab"
                            href="#user-list">List</a></li>
                </ul>
                {{-- <div class="header-action">
                    <button type="button" class="btn btn-primary" wire:click="$emit('add')"><i
                            class="fe fe-plus mr-2"></i>Add</button>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="section-body mt-3">
        <div class="container-fluid">
            <div class="tab-content mt-3">
                <div class="tab-pane fade show active" id="user-list" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Laporan Keuangan</h3>
                            <div class="card-options">
                                {{-- <select wire:model='company_id' class="form-control mr-10">
                                    <option value=""></option>
                                    @foreach ($selectCompanies as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select> --}}

                                <input type="month" wire:model="periode" class="form-control">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover text-muted">
                                    @forelse ($finance as $company => $item)
                                        <tr class="h6">
                                            <td class="w-25">{{ $company }}</td>
                                            <td class="w-25 text-right text-small">{{ rupiah($item, 2) }}</td>
                                            <td class="w-25"></td>
                                        </tr>
                                        @if ($loop->last)
                                            <tr class="lead bg-light">
                                                <td>SISA LABA USAHA</td>
                                                <td class="border-top border-dark text-right"></td>
                                                <td class="text-right">{{ rupiah($finance->sum(), 2) }}</td>
                                            </tr>
                                        @endif
                                    @empty
                                        Tidak ada data
                                    @endforelse
                                </table>
                            </div>
                      
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@section('popup')
@endsection

@section('page-styles')
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/core.js') }}"></script>
@endsection
