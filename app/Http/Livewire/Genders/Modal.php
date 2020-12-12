<?php

namespace App\Http\Livewire\Genders;

use App\Models\Gender;
use Livewire\Component;

class Modal extends Component
{
    public $myId;
    public $name;
    public $editMode = false;

    protected $listeners = ['edit', 'add'];

    public function render()
    {
        return view('livewire.genders.modal');
    }

    public function add()
    {
        $this->reset();

        $this->editMode = false;

        $this->emit('modal');
    }

    public function edit($gender)
    {
        $this->editMode = true;

        $this->fill($gender);
        $this->myId = $gender['id'];

        $this->emit('modal');
    }

    public function submit()
    {
        if (!$this->editMode) {

            $validateData = $this->validate([
                'name' => "required|unique:genders,name,NULL,id,deleted_at,NULL",
            ]);

            Gender::create($validateData);

            session()->flash('success', 'Data Saved.');
        } else {

            $validateData = $this->validate([
                'name' => "required|unique:genders,name,{$this->myId},id,deleted_at,NULL",
            ]);

            Gender::find($this->myId)->update($validateData);

            session()->flash('success', 'Data Saved.');
        }
        $this->emit('modal');
        $this->emit('refresh');
    }
}
