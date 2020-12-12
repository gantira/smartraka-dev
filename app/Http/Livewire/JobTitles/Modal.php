<?php

namespace App\Http\Livewire\JobTitles;

use App\Models\JobTitle;
use Livewire\Component;

class Modal extends Component
{
    public $myId;
    public $name;
    public $editMode = false;

    protected $listeners = ['edit', 'add'];

    public function render()
    {
        return view('livewire.job-titles.modal');
    }

    public function add()
    {
        $this->reset();

        $this->editMode = false;

        $this->emit('modal');
    }

    public function edit($jobtitle)
    {
        $this->editMode = true;

        $this->fill($jobtitle);
        $this->myId = $jobtitle['id'];

        $this->emit('modal');
    }

    public function submit()
    {
        if (!$this->editMode) {

            $validateData = $this->validate([
                'name' => "required|unique:job_titles,name,NULL,id,deleted_at,NULL",
            ]);

            JobTitle::create($validateData);

            session()->flash('success', 'Data Saved.');
        } else {

            $validateData = $this->validate([
                'name' => "required|unique:job_titles,name,{$this->myId},id,deleted_at,NULL",
            ]);

            JobTitle::find($this->myId)->update($validateData);

            session()->flash('success', 'Data Saved.');
        }
        $this->emit('modal');
        $this->emit('refresh');
    }
}
