<?php

namespace App\Http\Livewire\Documents;

use App\Models\Category;
use App\Models\Document;
use App\Models\DocumentDetail;
use App\Models\Product;
use App\Traits\MakeReport;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use File;
use Image;

class Out extends Component
{
    use WithFileUploads, MakeReport;

    public $category_id;
    public $sof;
    public $description;
    public $image;
    public $transaction_date;
    public $price;
    public $product_id;
    public $qty;
    public $toggle = true;

    public function render()
    {
        return view('livewire.documents.out', [
            'selectProducts' => Product::myCompany()->get(),
            'selectCategories' => Category::out()->myCompany()->get(),
        ]);
    }

    public function submit()
    {
        $path = storage_path('app/public/images');

        $validateData = $this->validate([
            'category_id' => 'required',
            'transaction_date' => 'required',
            'sof' => 'required',
            'description' => 'required',
            'image' => 'required|file|mimes:jpeg,png,jpg',
        ]);

        if (!count(session()->get('cartOut'))) {
            session()->flash('danger', 'Please insert document.');
            return;
        }

        if ($this->image) {
            if (!File::isDirectory($path)) {
                File::makeDirectory($path);
            }

            $fileName = Carbon::now()->timestamp .  '-' . uniqid() . '.' . $this->image->getClientOriginalExtension();
            Image::make($this->image)->save($path . '/' . $fileName, 70);
            $validateData['image'] = $fileName;
        }

        $document = Document::create($validateData);
        foreach (session('cartOut') as $item) {
            DocumentDetail::create([
                'document_id' => $document->id,
                'product_id' => $item['product_id'],
                'qty' => $item['product_qty'],
                'price' => $item['product_price'],
            ]);
        }

        $this->makeReport($document, 'out');

        session()->put('cartOut', []);
        session()->flash('success', 'Data Saved.');
        
        $this->emit('alert', 'success', "Data disimpan");
        $this->emit('modal');
        $this->emit('refresh');

        $this->reset();
        $this->resetValidation();
    }

    public function addToCart()
    {
        $id = $this->product_id;

        $this->validate([
            'product_id' => 'required|exists:products,id',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
        ]);

        $cartOut = session()->get('cartOut');

        if ($cartOut && array_key_exists($id, $cartOut)) {
            $product = Product::findOrFail($id);

            $cartOut[$id]['product_qty'] = $this->qty;
            $cartOut[$id]['product_subtotal'] = $cartOut[$id]['product_qty'] * $this->price;
        } else {
            $product = Product::findOrFail($id);
            $cartOut[$id] = [
                'product_id' => $product->id,
                'product_qty' => $this->qty,
                'product_name' => $product->name,
                'product_price' => $this->price,
                'product_subtotal' => $this->qty * $this->price,
            ];
        }

        $this->reset(['product_id', 'qty', 'price']);

        session()->put('cartOut', $cartOut);
    }

    public function deleteFromCart($id)
    {
        $carts = session()->get('cartOut');

        unset($carts[$id]);

        session()->put('cartOut', $carts);
    }

    public function getTotalItemProperty()
    {
        return count(session()->get('cartOut'));
    }

    public function getTotalQtyProperty()
    {
        return !empty(session('cartOut')) ? collect(session('cartOut'))->sum('product_qty') : 0;
    }

    public function getTotalProperty()
    {
        return !empty(session('cartOut')) ? collect(session('cartOut'))->sum('product_subtotal') : 0;
    }
}

