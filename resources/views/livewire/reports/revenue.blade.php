@section('title')
    Laporan Laba Rugi
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
                            <h3 class="card-title">Laporan Laba Rugi</h3>
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
                            <table class="table table-sm table-bordered table-hover">
                                @forelse ($revenues as $company => $item)
                                    <tr>
                                        <td colspan="3" class="text-uppercase text-center bg-green text-white h1">{{ $company }}</td>
                                    </tr>
                                    @foreach ($item as $label => $row)
                                        <tr>
                                            <td colspan="3" class="lead text-uppercase bg-light lead"> {{ $label }}</td>
                                        </tr>
                                        @foreach ($row as $index => $account)
                                            <tr>
                                                <td colspan="3" class="font-weight-lighter">{{ $index }}</td>
                                            </tr>
                                            @foreach ($account as $key => $val)
                                                <tr class="text-muted">
                                                    <td class="w-50 ">- {{ $key }}</td>
                                                    <td class="w-25 text-right">{{ rupiah($val, 2) }}</td>
                                                    <td></td>
                                                </tr>
                                                @if ($loop->last)
                                                    <tr class="font-weight-bold">
                                                        <td>Total {{ $index }}</td>
                                                        <td class="text-right">{{ rupiah($account->sum(), 2) }}</td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            @if ($loop->last)
                                                <tr class="font-weight-bold bg-light">
                                                    <td class="text-uppercase">TOTAL {{ $label }}</td>
                                                    <td></td>
                                                    <td class="text-right">{{ rupiah($item[$label]->flatten()->sum(), 2) }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        @if ($loop->last)
                                            <tr class="font-weight-bold bg-light lead">
                                                <td class="text-uppercase">LABA RUGI USAHA</td>
                                                <td></td>
                                                <td class="text-right">
                                                    {{ rupiah($item['Pendapatan']->flatten()->sum() - $item['Biaya']->flatten()->sum(), 2) }}
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
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
    @section('popup')
    @endsection

    @section('page-styles')
    @endsection

    @section('page-script')
        <script src="{{ asset('assets/js/core.js') }}"></script>
    @endsection
