<?php

namespace App\Http\Livewire\Religions;

use App\Models\Religion;
use Livewire\Component;

class Modal extends Component
{
    public $myId;
    public $name;
    public $editMode = false;

    protected $listeners = ['edit', 'add'];

    public function render()
    {
        return view('livewire.religions.modal');
    }

    public function add()
    {
        $this->reset();

        $this->editMode = false;

        $this->emit('modal');
    }

    public function edit($religion)
    {
        $this->editMode = true;

        $this->fill($religion);
        $this->myId = $religion['id'];

        $this->emit('modal');
    }

    public function submit()
    {
        if (!$this->editMode) {

            $validateData = $this->validate([
                'name' => "required|unique:religions,name,NULL,id,deleted_at,NULL",
            ]);

            Religion::create($validateData);

            session()->flash('success', 'Data Saved.');
        } else {

            $validateData = $this->validate([
                'name' => "required|unique:religions,name,{$this->myId},id,deleted_at,NULL",
            ]);

            Religion::find($this->myId)->update($validateData);

            session()->flash('success', 'Data Saved.');
        }
        $this->emit('modal');
        $this->emit('refresh');
    }
}
