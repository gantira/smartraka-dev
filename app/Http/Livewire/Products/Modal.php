<?php

namespace App\Http\Livewire\Products;

use App\Models\Unit;
use App\Models\Product;
use Livewire\Component;

class Modal extends Component
{
    public $myId;
    public $name;
    public $price;
    public $unit_id;
    public $editMode = false;

    protected $listeners = ['edit', 'add'];

    public function render()
    {
        return view('livewire.products.modal', [
            'selectUnits' => Unit::all()
        ]);
    }

    public function add()
    {
        $this->reset();

        $this->editMode = false;

        $this->emit('modal');
    }

    public function edit($product)
    {
        $this->editMode = true;

        $this->fill($product);
        $this->myId = $product['id'];

        $this->emit('modal');
    }

    public function submit()
    {
        if (!$this->editMode) {

            $this->validate([
                'name' => 'required',
                'price' => 'required',
                'unit_id' => 'required|exists:units,id',
            ]);

            Product::create([
                'company_id' => auth()->user()->company->id,
                'name' => $this->name,
                'price' => $this->price,
                'unit_id' => $this->unit_id,
            ]);

            session()->flash('success', 'Data Saved.');
        } else {

            $this->validate([
                'name' => "required|unique:products,name,{$this->myId},id,deleted_at,{$this->myId}",
                'price' => 'required',
                'unit_id' => 'required|exists:units,id',
            ]);

            Product::find($this->myId)->update([
                'company_id' => auth()->user()->company->id,
                'name' => $this->name,
                'price' => $this->price,
                'unit_id' => $this->unit_id,
            ]);

            session()->flash('success', 'Data Saved.');
        }

        $this->emit('modal');
        $this->emit('refresh');
    }
}
