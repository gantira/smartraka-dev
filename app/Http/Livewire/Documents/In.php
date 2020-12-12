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

class In extends Component
{
    use WithFileUploads, MakeReport;

    public $category_id;
    public $sof;
    public $description;
    public $image;
    public $transaction_date;
    public $product_id;
    public $qty;
    public $toggle = true;

    public function render()
    {
        return view('livewire.documents.in', [
            'selectProducts' => Product::myCompany()->get(),
            'selectCategories' => Category::myCompany()->in()->get(),
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

        if (!count(session()->get('cartIn'))) {
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
        foreach (session('cartIn') as $item) {
            DocumentDetail::create([
                'document_id' => $document->id,
                'product_id' => $item['product_id'],
                'qty' => $item['product_qty'],
                'price' => $item['product_price'],
            ]);
        }

        $this->makeReport($document, 'in');

        session()->put('cartIn', []);
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
            'qty' => 'required|numeric'
        ]);

        $cartIn = session()->get('cartIn');

        if ($cartIn && array_key_exists($id, $cartIn)) {
            $product = Product::findOrFail($id);

            $cartIn[$id]['product_qty'] = $this->qty;
            $cartIn[$id]['product_subtotal'] = $cartIn[$id]['product_qty'] * $product->price;
        } else {
            $product = Product::findOrFail($id);
            $cartIn[$id] = [
                'product_id' => $product->id,
                'product_qty' => $this->qty,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_subtotal' => $this->qty * $product->price,
            ];
        }

        $this->reset(['product_id', 'qty']);

        session()->put('cartIn', $cartIn);
    }

    public function deleteFromCart($id)
    {
        $carts = session()->get('cartIn');

        unset($carts[$id]);

        session()->put('cartIn', $carts);
    }

    public function getTotalItemProperty()
    {
        return count(session()->get('cartIn'));
    }

    public function getTotalQtyProperty()
    {
        return !empty(session('cartIn')) ? collect(session('cartIn'))->sum('product_qty') : 0;
    }

    public function getTotalProperty()
    {
        return !empty(session('cartIn')) ? collect(session('cartIn'))->sum('product_subtotal') : 0;
    }
}
