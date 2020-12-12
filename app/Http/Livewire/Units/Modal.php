<?php

namespace App\Http\Livewire\Units;

use App\Models\Unit;
use Livewire\Component;

class Modal extends Component
{
    public $myId;
    public $name;
    public $editMode = false;

    protected $listeners = ['edit', 'add'];

    public function render()
    {
        return view('livewire.units.modal');
    }

    public function add()
    {
        $this->reset();

        $this->editMode = false;

        $this->emit('modal');
    }

    public function edit($unit)
    {
        $this->editMode = true;

        $this->fill($unit);
        $this->myId = $unit['id'];

        $this->emit('modal');
    }

    public function submit()
    {
        if (!$this->editMode) {

            $validateData = $this->validate([
                'name' => "required|unique:units,name,NULL,id,deleted_at,NULL",
            ]);

            Unit::create($validateData);

            session()->flash('success', 'Data Saved.');
        } else {

            $validateData = $this->validate([
                'name' => "required|unique:units,name,{$this->myId},id,deleted_at,NULL",
            ]);

            Unit::find($this->myId)->update($validateData);

            session()->flash('success', 'Data Saved.');
        }
        $this->emit('modal');
        $this->emit('refresh');
    }
}
