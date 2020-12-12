<?php

namespace App\Http\Livewire\Signatures;

use App\Models\Signature;
use App\Models\User;
use Livewire\Component;

class Modal extends Component
{
    public $signature;
    public $user_id;
    public $sebagai;
    public $editMode = false;

    protected $listeners = ['edit', 'add'];

    public function render()
    {
        return view('livewire.signatures.modal', [
            'selectUsers' => User::whereHas('company', function ($query) {
                return $query->where('name', auth()->user()->company->name);
            })->get()->reject(function ($value, $key) {
                return in_array($value->getRoleNames()->first(), ['super-admin', 'admin']);
            })
        ]);
    }

    public function add()
    {
        $this->emit('modal');
    }

    public function submit()
    {
        $this->validate([
            'user_id' => 'required|exists:users,id',
            'sebagai' => 'nullable',
        ]);

        Signature::updateOrCreate(
            ['user_id' => $this->user_id],
            ['user_id' => $this->user_id, 'sebagai' => $this->sebagai],
        );

        session()->flash('success', 'Data Saved.');

        $this->emit('modal');
        $this->emit('refresh');

        $this->reset();
        $this->resetValidation();
    }
}
