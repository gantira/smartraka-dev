<?php

namespace App\Http\Livewire\Settings;

use App\Models\Setting;
use Livewire\Component;

class Modal extends Component
{
    public $myId;
    public $funds;
    public $editMode = false;

    protected $listeners = ['edit', 'add'];

    public function render()
    {
        return view('livewire.settings.modal');
    }

    public function add()
    {
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
                'funds' => "required",
            ]);

            Setting::create($validateData);

            session()->flash('success', 'Data Saved.');
        } else {

            $validateData = $this->validate([
                'funds' => "required",
            ]);

            Setting::find($this->myId)->update($validateData);

            session()->flash('success', 'Data Saved.');
        }
        $this->emit('modal');
        $this->emit('refresh');

        $this->reset();
        $this->resetValidation();
    }
}
