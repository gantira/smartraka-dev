<?php

namespace App\Http\Livewire\Accounts;

use App\Models\Account;
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
        return view('livewire.accounts.modal');
    }

    public function add()
    {
        $this->reset();

        $this->editMode = false;

        $this->emit('modal');
    }

    public function edit($account)
    {
        $this->editMode = true;

        $this->fill($account);
        $this->myId = $account['id'];

        $this->emit('modal');
    }

    public function submit()
    {
        if (!$this->editMode) {

            $validateData = $this->validate([
                'name' => "required|unique:accounts,name,NULL,id,deleted_at,NULL",
                'description' => 'required|string|max:255',
                'status' => 'required|in:0,1,2',
            ]);

            Account::create($validateData);

            session()->flash('success', 'Data Saved.');
        } else {

            $validateData = $this->validate([
                'name' => "required|unique:accounts,name,{$this->myId},id,deleted_at,NULL",
                'description' => 'required|string|max:255',
                'status' => 'required|in:0,1,2',
            ]);

            Account::find($this->myId)->update($validateData);

            session()->flash('success', 'Data Saved.');
        }
        $this->emit('modal');
        $this->emit('refresh');
    }
}
