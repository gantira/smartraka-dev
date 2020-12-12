@section('title')
    Documents
@endsection

<div>
    <div class="section-body">
        <div class="container-fluid">
            <div class="d-md-flex justify-content-between align-items-center">
                <ul class="nav nav-tabs page-header-tab">
                    <li class="nav-item active"><a class="nav-link active" id="Report-tab" data-toggle="tab"
                            href="#invoice">List</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="Report-tab" data-toggle="tab" href="#detail">Detail</a>
                    </li>
                </ul>
                <div class="header-action d-flex">
                    <select class="custom-select mr-2">
                        <option>Year</option>
                        <option>Month</option>
                        <option>Week</option>
                    </select>
                    <button type="button" class="btn btn-primary" wire:click="$emit('add')"><i
                            class="fe fe-plus mr-2"></i>Add</button>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body mt-3">
        <div class="container-fluid">
            <div class="tab-content mt-3">
                <div class="tab-pane fade show active" id="invoice" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-lg-3">
                                    <h4 class="mb-1"><i class="mdi mdi-trending-neutral text-warning"></i> <span
                                            class="counter">{{ $documentCount->statusCount(0) }}</span></h4>
                                    <div class="text-muted-dark">
                                        <a href="#" wire:click="$set('status', '0')">Inprogress</a>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <h4 class="mb-1"><i class="mdi mdi-trending-down text-danger"></i> <span
                                            class="counter">{{ $documentCount->statusCount(1) }}</span></h4>
                                    <div class="text-muted-dark">
                                        <a href="#" wire:click="$set('status', 1)">Total Approved</a>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <h4 class="mb-1"><i class="mdi mdi-trending-neutral text-warning"></i> <span
                                            class="counter">{{ $documentCount->statusCount(2) }}</span></h4>
                                    <div class="text-muted-dark">
                                        <a href="#" wire:click="$set('status', 2)">Rejected</a>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <h4 class="mb-1"><i class="mdi mdi-trending-up text-success"></i> <span
                                            class="counter">{{ $documentCount->statusCount(3) }}</span></h4>
                                    <div class="text-muted-dark">
                                        <a href="#" wire:click="$set('status', 3)">Pending Invoice</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Document List</h3>
                            <div class="card-options">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Search something...">
                                        <span class="input-group-btn ml-2"><button class="btn btn-icon btn-sm"
                                                type="submit"><span class="fe fe-search"></span></button></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-vcenter text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Invoice No.</th>
                                            <th>sof</th>
                                            <th>Description</th>
                                            <th>Transaction Date</th>
                                            <th>Status</th>
                                            <th>Amount</th>
                                            <th class="w100">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($documents as $document)
                                            <tr>
                                                <td>#{{ $document->invoice }}</td>
                                                <td>{{ $document->sof }}</td>
                                                <td class="text-wrap">{{ $document->description }}</td>
                                                <td>{{ \Carbon\Carbon::parse($document->transaction_date)->format('d F, Y') }}
                                                </td>
                                                <td>{!! $document->status_label !!}</td>
                                                <td>{{ rupiah($document->total) }}</td>
                                                <td>
                                                    <button wire:click="detail({{ $document->id }})" type="button"
                                                        class="btn btn-icon btn-sm btn-sm" title="Detail"
                                                        data-toggle="tooltip" data-placement="top"><i
                                                            class="icon-eye"></i></button>

                                                    <button wire:click="showConfirmation({{ $document->id }})" type="button"
                                                        class="btn btn-icon btn-sm btn-sm" title="Delete"
                                                        data-toggle="tooltip" data-placement="top"><i
                                                            class="icon-trash"></i></button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="h-100 text-center" colspan="7">Tidak ada data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {{ $documents->links() }}
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="detail" role="tabpanel">
                    <div class="row clearfix">
                        @if ($detail)
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">#{{ $detail->invoice }}</h3>
                                        <div class="card-options">
                                            <button type="button" class="btn btn-primary"><i class="si si-printer"></i>
                                                Print Invoice</button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row my-8">
                                            <div class="col-6">
                                                <p class="h3">{{ auth()->user()->company->name }}</p>
                                                <address>
                                                    {{ auth()->user()->company->address }}<br>
                                                    {{ auth()->user()->company->phone }}<br>
                                                    {{ auth()->user()->company->email }}
                                                </address>
                                            </div>
                                            <div class="col-6 text-right">
                                                <p class="h3">Invoice#{{ $detail->invoice }}</p>
                                                <address>
                                                    Date:
                                                    {{ \Carbon\Carbon::parse($document->transaction_date)->format('d F, Y') }}<br>
                                                    Status: {!! $detail->status_label !!}<br>
                                                    Source of funds: {{ $detail->sof }}<br>
                                                </address>
                                            </div>
                                        </div>
                                        <div class="table-responsive push">
                                            <table class="table table-bordered table-hover text-nowrap">
                                                <tbody>
                                                    <tr>
                                                        <th class="text-center width35"></th>
                                                        <th>Product</th>
                                                        <th class="text-center" style="width: 1%">Qnt</th>
                                                        <th class="text-right" style="width: 1%">Unit</th>
                                                        <th class="text-right" style="width: 1%">Amount</th>
                                                    </tr>
                                                    @foreach ($detail->documentdetail as $index => $item)
                                                        <tr>
                                                            <td class="text-center">{{ $index + 1 }}</td>
                                                            <td>
                                                                <p class="font600 mb-1">{{ $item->product->name }}</p>
                                                                <div class="text-muted">
                                                                    {{ $item->document->description }}
                                                                </div>
                                                            </td>
                                                            <td class="text-center">{{ $item->qty }}</td>
                                                            <td class="text-right">{{ rupiah($item->price) }}</td>
                                                            <td class="text-right">
                                                                {{ rupiah($item->qty * $item->price) }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td></td>
                                                        <td>Total</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="text-right">{{ rupiah($detail->total) }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <a href="{{ $detail->previewImage }}" target="_blank">
                                                    <i class="icon-picture"></i> Attachment <br />
                                                </a>
                                                <p class="text-black-50">{{ $detail->description }}</p>
                                            </div>
                                            <div class="align-text-bottom">
                                                @if ($this->show)
                                                    <button class="btn btn-default"
                                                        wire:click="setPending({{ $detail->id }})">Pending</button>
                                                    <button class="btn btn-secondary"
                                                        wire:click="setRejected({{ $detail->id }})">Rejected</button>
                                                    <button class="btn btn-success"
                                                        wire:click="setApproved({{ $detail->id }})">Approved</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('popup')
    <livewire:documents.modal />
@endsection

@section('page-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.6.1/sweetalert2.min.js" />
@endsection

@section('page-script')
    <script src="{{ asset('assets/bundles/counterup.bundle.js') }}"></script>
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
                SwalConfirm(data.icon, data.title, data.text, data.confirmText, data.method, data.params,
                    data.callback)
            })
        })

    </script>

    <script>
        $(function() {
            "use strict";
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });

        Livewire.on('modal', () => {
            $('#modal').modal('toggle')
        })

        Livewire.on('tabs', () => {
            $('.nav-tabs a[href="#detail"]').tab('show')
        })

    </script>
@endsection
