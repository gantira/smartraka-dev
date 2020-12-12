<?php

namespace App\Http\Livewire\Maritals;

use App\Models\Marital;
use Livewire\Component;

class Modal extends Component
{
    public $myId;
    public $name;
    public $editMode = false;

    protected $listeners = ['edit', 'add'];

    public function render()
    {
        return view('livewire.maritals.modal');
    }

    public function add()
    {
        $this->reset();

        $this->editMode = false;

        $this->emit('modal');
    }

    public function edit($marital)
    {
        $this->editMode = true;

        $this->fill($marital);
        $this->myId = $marital['id'];

        $this->emit('modal');
    }

    public function submit()
    {
        if (!$this->editMode) {

            $validateData = $this->validate([
                'name' => "required|unique:maritals,name,NULL,id,deleted_at,NULL",
            ]);

            Marital::create($validateData);

            session()->flash('success', 'Data Saved.');
        } else {

            $validateData = $this->validate([
                'name' => "required|unique:maritals,name,{$this->myId},id,deleted_at,NULL",
            ]);

            Marital::find($this->myId)->update($validateData);

            session()->flash('success', 'Data Saved.');
        }
        $this->emit('modal');
        $this->emit('refresh');
    }
}
