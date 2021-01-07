@section('title')
    Pengaturan
@endsection

<div>
    <div class="section-body">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <ul class="nav nav-tabs page-header-tab">
                    <li class="nav-item"><a class="nav-link active" id="user-tab" data-toggle="tab"
                            href="#user-list">Daftar</a></li>
                </ul>
                <div class="header-action">
                    <button type="button" class="btn btn-primary" wire:click="$emit('add')"><i
                            class="fe fe-plus mr-2"></i>Tambah</button>
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
                            <h3 class="card-title">Pengaturan</h3>
                            <div class="card-options">
                                <form>
                                    <div class="input-group">
                                        <input type="text" wire:model.debounce.500ms="searchTerms"
                                            class="form-control form-control-sm" placeholder="Cari...">
                                        <span class="input-group-btn ml-2"><button class="btn btn-sm btn-default"
                                                type="submit"><span class="fe fe-search"></span></button></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-striped table-hover table-vcenter text-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th>Max Dana</th>
                                            <th>Tanggal</th>
                                            <th class="w100">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($settings as $setting)
                                            <tr>
                                                <td>{{ rupiah($setting->funds) }}</td>
                                                <td>{{ $setting->created_at->format('d/m/Y') }}</td>
                                                <td>
                                                    <button wire:click="$emit('edit', {{ $setting }})" type="button"
                                                        class="btn btn-icon btn-sm btn-sm" title="Edit"
                                                        data-toggle="tooltip" data-placement="top"><i
                                                            class="icon-note"></i></button>
                                                    <button wire:click="showConfirmation({{ $setting->id }})" type="button"
                                                        class="btn btn-icon btn-sm btn-sm" title="Delete"
                                                        data-toggle="tooltip" data-placement="top"><i
                                                            class="icon-trash"></i></button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center">Tidak ada data</td>
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

@section('popup')
    <livewire:settings.modal />
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
                SwalConfirm(data.icon, data.title, data.text, data.confirmText, data.method, data.params,
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
