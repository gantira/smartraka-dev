<div wire:ignore.self class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document" data-backdrop="static" data-keyboard="false">
        <form wire:submit.prevent='submit'>
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">{{ $editMode ? 'Edit' : 'Add' }} Product </h6>
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
                            <div class="form-group">
                                <input wire:model.defer='price' type="number"
                                    class="form-control @error('price') is-invalid @enderror" placeholder="Price">
                                @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <select wire:model.defer='unit_id'
                                        class="form-control @error('unit_id') is-invalid @enderror">
                                        <option value="">-- Select Unit --</option>
                                        @foreach ($selectUnits as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('unit_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
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
