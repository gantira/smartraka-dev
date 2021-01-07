@section('title')
    Laporan Buku Besar
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
                                @forelse ($ledgers as $key => $row)
                                    <h4 class="font-weight-bold text-uppercase mb-2">{{ $key }}</h4>
                                    @foreach ($row as $key => $item)
                                        <p class="mb-0 badge badge-secondary">{{ $key }}</p>
                                        <table id="example"
                                            class="table table-sm table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Cabang</th>
                                                    <th>Tanggal</th>
                                                    <th>Uraian</th>
                                                    <th class="text-right">Debit</th>
                                                    <th class="text-right">Kredit</th>
                                                    <th class="text-right">Saldo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($item as $key => $value)
                                                    <tr>

                                                        <td>{{ $value->company }}</td>
                                                        <td>{{ $value->tanggal }}</td>
                                                        <td>{{ $value->uraian }}</td>
                                                        <td class="text-right">{{ $value->debit }}</td>
                                                        <td class="text-right">{{ $value->credit }}</td>
                                                        <td class="text-right">{{ $value->saldo }}</td>
                                                    </tr>
                                                @empty
                                                    <tr class="text-center">
                                                        <td colspan="6">Tidak ada data</td>
                                                    </tr>

                                    @endforelse
                                    </tbody>
                                    </table>
                                    @endforeach
                                    @empty
                                        <p>Tada ada data</p>
                                    @endforelse

                                </div>
                                <div class="d-flex justify-content-between align-items-start mt-15">
                                    {{-- <div>{{ $ledgers->links() }}</div>
                                    --}}
                                    <div class="d-flex align-items-end text-nowrap">
                                        <div class="mr-1"></div>
                                        <div>
                                            <select wire:model="perPage" class="form-control">
                                                <option value="5">5</option>
                                                <option value="10">10</option>
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
