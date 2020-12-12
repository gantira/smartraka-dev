<div wire:ignore.self class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form wire:submit.prevent='submit'>
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">{{ $editMode ? 'Edit' : 'Add' }} Funds </h6>
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
                                <input wire:model.defer='funds' type="text"
                                    class="form-control @error('funds') is-invalid @enderror" placeholder="Funds">
                                @error('funds')
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
</div>
