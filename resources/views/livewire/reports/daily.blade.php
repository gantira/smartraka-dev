@section('title')
    Report Harian
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
                            <h3 class="card-title">Report Harian</h3>
                            <div class="card-options">
                                <select wire:model='company_id' class="form-control mr-10">
                                    <option value=""></option>
                                    @foreach ($selectCompanies as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>

                                <input type="month" wire:model="periode" class="form-control">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-striped table-hover table-vcenter text-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th>Cabang</th>
                                            <th>Tanggal</th>
                                            <th>Kategori</th>
                                            <th>Kuantitas</th>
                                            <th class="text-right">Debit</th>
                                            <th class="text-right">Kredit</th>
                                            <th class="text-right">Saldo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($dailys as $item)
                                            <tr>
                                                <td>{{ $item->document->category->company->name }}</td>
                                                <td>{{ tanggal($item->created_at) }}</td>
                                                <td>{{ $item->document->category->name }}</td>
                                                <td align="center">{{ $item->document->totalqty }}</td>
                                                <td align="right">{{ rupiah($item->debit, 2) }}</td>
                                                <td align="right">{{ rupiah($item->credit, 2) }}</td>
                                                <td align="right">{{ rupiah($item->saldo, 2) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Data tidak ditemukan</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-between align-items-start mt-15">
                                <div>{{ $dailys->links() }}</div>
                                <div class="d-flex align-items-center text-nowrap">
                                    <div class="mr-1">Show Page</div> 
                                    <div>
                                        <select wire:model="perPage" class="form-control">
                                            <option value="15">15</option>
                                            <option value="25">25</option>
                                        </select>
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

@section('popup')
@endsection

@section('page-styles')
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/core.js') }}"></script>
@endsection
