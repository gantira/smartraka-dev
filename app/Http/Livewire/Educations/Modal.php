<?php

namespace App\Http\Livewire\Educations;

use App\Models\Education;
use Livewire\Component;

class Modal extends Component
{
    public $myId;
    public $name;
    public $description;
    public $status;
    public $editMode = false;

    protected $listeners = ['edit', 'add'];

    public function render()
    {
        return view('livewire.educations.modal');
    }

    public function add()
    {
        $this->reset();

        $this->editMode = false;

        $this->emit('modal');
    }

    public function edit($education)
    {
        $this->editMode = true;

        $this->fill($education);
        $this->myId = $education['id'];

        $this->emit('modal');
    }

    public function submit()
    {
        if (!$this->editMode) {

            $validateData = $this->validate([
                'name' => "required|unique:education,name,NULL,id,deleted_at,NULL",
            ]);

            Education::create($validateData);

            session()->flash('success', 'Data Saved.');
        } else {

            $validateData = $this->validate([
                'name' => "required|unique:education,name,{$this->myId},id,deleted_at,NULL",
            ]);

            Education::find($this->myId)->update($validateData);

            session()->flash('success', 'Data Saved.');
        }
        $this->emit('modal');
        $this->emit('refresh');
    }
}
