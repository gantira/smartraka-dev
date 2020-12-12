<?php

namespace App\Http\Livewire\Documents;

use Livewire\Component;

class Modal extends Component
{
    protected $listeners = ['add'];

    public function render()
    {
        return view('livewire.documents.modal');
    }

    public function add()
    {
        $this->emit('modal');
    }

}
