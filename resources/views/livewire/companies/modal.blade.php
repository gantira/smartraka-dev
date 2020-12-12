<div wire:ignore.self class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form wire:submit.prevent='submit'>
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">{{ $editMode ? 'Edit' : 'Add' }} Account </h6>
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
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-12">
                            <div class="form-group">
                                <input wire:model.defer='email' type="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-12">
                            <div class="form-group">
                                <input wire:model.defer='pic' type="text"
                                    class="form-control @error('pic') is-invalid @enderror" placeholder="PIC">
                                @error('pic')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-12">
                            <div class="form-group">
                                <input wire:model.defer='phone' type="text"
                                    class="form-control @error('phone') is-invalid @enderror" placeholder="Phone">
                                @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea wire:model.defer='address' class="form-control @error('address') is-invalid @enderror" placeholder="Address"></textarea>
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{ $editMode ? 'Update' : 'Add' }}</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
        </form>
    </div>
</div>
