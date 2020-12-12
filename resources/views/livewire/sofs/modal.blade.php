<div wire:ignore.self class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document" data-backdrop="static" data-keyboard="false">
        <form wire:submit.prevent='submit'>
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">{{ $editMode ? 'Edit' : 'Add' }} Submission of Funds </h6>
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
                                <input wire:model.defer='price' type="number"
                                    class="form-control @error('price') is-invalid @enderror" placeholder="Amount"
                                    {{ $this->editMode ? 'readonly' : '' }}>
                                @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea wire:model.defer='description' type="text"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Description" {{ $this->editMode ? 'readonly' : '' }}></textarea>
                                @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            @if (!is_null($status))
                                <div class="form-group">
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control custom-radio">
                                            <input wire:model='status' name="statu" type="radio"
                                                class="custom-control-input" name="example-radios" value="1">
                                            <div class="custom-control-label">Pending</div>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input wire:model='status' name="statu" type="radio"
                                                class="custom-control-input" name="example-radios" value="2">
                                            <div class="custom-control-label">Approved</div>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input wire:model='status' name="statu" type="radio"
                                                class="custom-control-input" name="example-radios" value="3">
                                            <div class="custom-control-label">Rejected</div>
                                        </label>
                                        @error('status')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea wire:model.defer='comment' type="number"
                                        class="form-control @error('comment') is-invalid @enderror"
                                        placeholder="Comment"></textarea>
                                    @error('comment')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit"
                        class="btn btn-primary {{ $this->show ? 'd-none' : '' }}">{{ $editMode ? 'Update' : 'Add' }}</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
        </form>
    </div>
</div>
</div>
