@section('title')
    Laporan Neraca
@endsection

<div>
    <div class="section-body">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <ul class="nav nav-tabs page-header-tab">
                    <li class="nav-item"><a class="nav-link active" id="user-tab" data-toggle="tab"
                            href="#user-list">List</a></li>
                </ul>
                <div class="header-action">
                    <button type="button" class="btn btn-primary" wire:click="$emit('add')"><i
                            class="fe fe-plus mr-2"></i>Add</button>
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
                            <h3 class="card-title">Laporan Neraca</h3>
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
                                @forelse ($neraca as $company => $item)
                                    <tr>
                                        <td colspan="3" class="text-uppercase text-center bg-green text-white h1">
                                            {{ $company }}
                                        </td>
                                    </tr>
                                    @foreach ($item as $label => $row)
                                        <tr>
                                            <td colspan="3" class="lead text-uppercase bg-light lead"> {{ $label }}</td>
                                        </tr>
                                        @foreach ($row as $index => $account)
                                            <tr>
                                                <td colspan="3" class="font-weight-lighter text-muted">{{ $index }}</td>
                                            </tr>
                                            @foreach ($account as $key => $val)
                                                <tr>
                                                    <td class="w-50">- {{ $key }}</td>
                                                    <td class="w-25 text-right">{{ rupiah($val, 2) }}</td>
                                                    <td></td>
                                                </tr>
                                                @if ($loop->last)
                                                    <tr class="font-weight-bold text-muted">
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
                                                    <td class="text-right">{{ rupiah($item[$label]->collapse()->sum(), 2) }}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach

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
        <livewire:reports.neraca-create />
    @endsection

    @section('page-styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.6.1/sweetalert2.min.js" />
    @endsection

    @section('page-script')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="{{ asset('assets/js/core.js') }}"></script>

        <script>
            const SwalConfirm = (icon, title, html, confirmButtonText, method, params, callback) => {
                Swal.fire({
                    icon,
                    title,
                    html,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText,
                    reverseButtons: true,
                }).then(result => {
                    if (result.value) {
                        return livewire.emit(method, params)
                    }

                    if (callback) {
                        return livewire.emit(callback)
                    }
                })
            }

            document.addEventListener('DOMContentLoaded', () => {
                this.livewire.on('swal:confirm', data => {
                    SwalConfirm(data.icon, data.title, data.text, data.confirmText, data.method, data
                        .params,
                        data.callback)
                })
            })

        </script>

        <script>
            Livewire.on('modal', () => {
                $('#modal').modal('toggle')
            })

        </script>
    @endsection
