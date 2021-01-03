<div wire:ignore.self class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form wire:submit.prevent='store'>
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Tambah Neraca </h6>
                </div>
                <div class="modal-body">
                    <div class="card mb-3">


                        <div class="card-body">
                
                            <div class="d-flex justify-content-center">
                                <div>
                                    <label for="month">Bulan</label>
                                    <select wire:model="month" class="form-control form-control-sm">
                                        <option value=""></option>
                                        @foreach ($monthOption as $key => $month)
                                            <option value="{{ $key }}">{{ $month }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mx-3"></div>
                                <div>
                                    <label for="year">Tahun</label>
                                    <select wire:model="year" class="form-control form-control-sm">
                                        <option value=""></option>
                                        @foreach ($yearOption as $key => $year)
                                            <option value="{{ $key }}">{{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="my-2">
                        @if (session()->has('message'))
                            <div class="alert alert-primary alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true"></span></button>
                                <strong>{{ session('message') }}</strong>
                            </div>
                        @endif
                    </div>
                
                    @if ($neracaPreview)
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-label-left" wire:submit.prevent="store">
                                    <div class="form-group row mb-2">
                                        <label class="control-label col-md-3 col-sm-3 ">Kategori*</label>
                                        <div class="">
                                            <select wire:model="neraca_account_id" class="form-control form-control-sm">>
                                                <option value=""></option>
                                                @foreach ($neracaOption as $label => $account)
                                                    <optgroup label="{{ $label }}">
                                                        @foreach ($account as $key => $item)
                                                            <option value="{{ $key }}">{{ $item }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label class="control-label col-md-3 col-sm-3 ">Nama Akun*</label>
                                        <div class="">
                                            <input wire:model="name" type="text" class="form-control form-control-sm">
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label class="control-label col-md-3 col-sm-3 ">Jumlah*</label>
                                        <div class="">
                                            <input wire:model="price" type="number" class="form-control form-control-sm" id="currency1">
                                            <span class="text-danger">{{ $errors->first('price') }}</span>
                                        </div>
                                    </div>
                                 
                                <hr>
                
                
                                <table class="table table-sm  table-borderless table-hover ">
                
                                    @forelse ($neracaPreview as $company => $item)
                                        <tr>
                                            <td colspan="3" class="text-uppercase text-center  lead">{{ $company }}</td>
                                        </tr>
                                        @foreach ($item as $label => $row)
                                            <tr>
                                                <td colspan="3" class="lead text-muted"> <u>{{ $label }}</u></td>
                                            </tr>
                                            @foreach ($row as $index => $account)
                                                <tr>
                                                    <td colspan="3" class="font-weight-lighter text-muted">{{ $index }}</td>
                                                </tr>
                                                @foreach ($account as $key => $val)
                                                    <tr>
                                                        <td class="w-50 ">- {{ $val->name }}
                                                            <i class="fa fa-trash-o" wire:click.prevent="delete({{ $val->id }})"></i>
                                                        </td>
                                                        <td class="w-25 text-right">{{ rupiah($val->price, 2) }}</td>
                                                        <td></td>
                                                    </tr>
                                                    @if ($loop->last)
                                                        <tr class="font-weight-bold text-muted">
                                                            <td>Total {{ $index }}</td>
                                                            <td class="text-right">{{ rupiah($account->sum('price'), 2) }}</td>
                                                            <td></td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                @if ($loop->last)
                                                    <tr class="font-weight-bold ">
                                                        <td class="text-uppercase ">TOTAL {{ $label }}</td>
                                                        <td></td>
                                                        <td class="text-right">
                                                            {{ rupiah($item[$label]->collapse()->sum('price'), 2) }}
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
                
                @endif
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
        </form>
    </div>
</div>
