<div wire:ignore.self class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form wire:submit.prevent='submit'>
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">{{ $editMode ? 'Edit' : 'Tambah' }} Kategori </h6>
                </div>
                <div class="modal-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session('success') }}.
                        </div>
                    @endif

                    <div class="row clearfix">
                        <div class="col-12">
                            <div class="form-group">
                                <input wire:model.defer='name' type="text"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Nama">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input wire:model.defer='description' type="text"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Deskripsi">
                                @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <select wire:model.defer='account_id'
                                        class="form-control @error('account_id') is-invalid @enderror">
                                        <option value="">-- Pilih Akun --</option>
                                        @foreach ($selectAccounts as $key => $account)
                                            <optgroup label="{{ $key }}">
                                                @foreach ($account as $row)
                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                    @error('account_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ $editMode ? 'Update' : 'Tambah' }}</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    </div>
        </form>
    </div>
</div>
</div>
