<div class="row">
    <div class="col-6">
        <div class="col-12">
            <form wire:submit.prevent="submit">
                <div class="form-group">
                    <select wire:model='category_id' class="form-control @error('category_id') is-invalid @enderror">
                        <option value="">-- Select Category --</option>
                        @foreach ($selectCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="date" wire:model.defer='transaction_date'
                            class="form-control @error('transaction_date') is-invalid @enderror"
                            placeholder="Transaction date">
                        @error('transaction_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <input wire:model.defer='sof' type="text" class="form-control @error('sof') is-invalid @enderror"
                        placeholder="Source of Funds">
                    @error('sof')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea wire:model.defer='description'
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Description"></textarea>
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="mb-3">
                        @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" alt="image" class="img-fluid w-50">
                        @else
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSVYFJoiQl5YPHK2xiOHeyplhJWUpFZT4m0vw&usqp=CAU"
                                class="img-fluid">
                        @endif
                    </div>

                    <label for="profileImage" style="cursor: pointer;">
                        <span class="fa fa-upload"></span> Upload attachment
                    </label>

                    <input wire:model="image" type="file" id="profileImage" style="display: none;" accept="image/*">


                    @error('image')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-6">
        <div class="col-12">
            @if (session()->has('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('danger') }}
                </div>
            @endif

            <div class="form-row">
                <div class="col">
                    <select class="form-control @error('product_id') is-invalid @enderror"
                        wire:model.defer="product_id">
                        <option value="">-- Select Detail Dokumen</option>
                        @foreach ($selectProducts as $product)
                            <option value="{{ $product->id }}">{{ $product->name }} - {{ rupiah($product->price) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <input type="text" class="form-control @error('qty') is-invalid @enderror" placeholder="Qty"
                        wire:model.defer="qty">
                </div>
                <div class="col">
                    <button type="button" class="btn btn-light" wire:click="addToCart">Add</button>
                </div>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                    <th>Document</th>
                    <th>Qty</th>
                    <th class="text-right">Amount</th>
                    <th class="text-right">Subtotal</th>
                    <th></th>
                </thead>
                <tbody>
                    @forelse (session('cartIn') as $item)
                        <tr>
                            <td>{{ $item['product_name'] }}</td>
                            <td class="text-center">{{ $item['product_qty'] }}</td>
                            <td class="text-right">{{ rupiah($item['product_price'], 2) }}</td>
                            <td class="text-right">{{ rupiah($item['product_subtotal'], 2) }}</td>
                            <td>
                                <a href="#" wire:click="deleteFromCart({{ $item['product_id'] }})">
                                    <i class="icon-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="h-100 text-center" colspan="5">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot class="{{ !$this->totalitem ? 'd-none' : '' }}">
                    <tr class="font-weight-medium">
                        <td>{{ $this->totalitem }} item(s)</td>
                        <td class="text-center">{{ $this->totalqty }}</td>
                        <td></td>
                        <td class="text-right">{{ rupiah($this->total, 2) }}</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>

</div>
