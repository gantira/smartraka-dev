@section('title')
    Laporan Jurnal
@endsection

<div>
    <div class="section-body">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <ul class="nav nav-tabs page-header-tab">
                    <li class="nav-item"><a class="nav-link active" id="user-tab" data-toggle="tab"
                            href="#user-list"></a></li>
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
                            <h3 class="card-title"></h3>
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
                                <table class="table table-sm  table-hover table-vcenter text-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th>Cabang</th>
                                            <th>Tanggal</th>
                                            <th>Uraian</th>
                                            <th class="text-right">Debit</th>
                                            <th class="text-right">Kredit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($journals as $key => $row)
                                            <tr>
                                                <td>{{ $key % 2 == 0 ? $row->company->name : '' }}</td>
                                                <td>{{ $key % 2 == 0 ? tanggal($row->created_at) : '' }}</td>
                                                <td class="{{ $key % 2 == 0 ?: 'text-right' }}">{{ $row->description }}
                                                </td>
                                                <td class="text-right">{{ rupiah($row->debit, 2) }}</td>
                                                <td class="text-right">{{ rupiah($row->credit, 2) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-between align-items-start mt-15">
                                <div>{{ $journals->links() }}</div>
                                <div class="d-flex align-items-center text-nowrap">
                                    <div class="mr-1"></div>
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
