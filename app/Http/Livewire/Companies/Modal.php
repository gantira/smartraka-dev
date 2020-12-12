<?php

namespace App\Http\Livewire\Companies;

use App\Models\Company;
use Livewire\Component;

class Modal extends Component
{
    public $myId;
    public $name;
    public $email;
    public $address;
    public $pic;
    public $phone;
    public $editMode = false;

    protected $listeners = ['edit', 'add'];

    public function render()
    {
        return view('livewire.companies.modal');
    }

    public function add()
    {
        $this->reset();

        $this->editMode = false;

        $this->emit('modal');
    }

    public function edit($company)
    {
        $this->editMode = true;

        $this->fill($company);
        $this->myId = $company['id'];

        $this->emit('modal');
    }

    public function submit()
    {
        if (!$this->editMode) {

            $validateData = $this->validate([
                'name' => 'required|unique:companies,name,NULL,id,deleted_at,NULL',
                'email' => 'required|email|unique:companies,email,NULL,id,deleted_at,NULL',
                'address' => 'required|max:255',
                'pic' => 'required|string',
                'phone' => 'required|string',
            ]);

            Company::create($validateData);

            session()->flash('success', 'Data Saved.');
        } else {

            $validateData = $this->validate([
                'name' => "required|unique:companies,name,{$this->myId},id,deleted_at,NULL",
                'email' => "required|email|unique:companies,email,{$this->myId},id,deleted_at,NULL",
                'address' => 'required|max:255',
                'pic' => 'required|string',
                'phone' => 'required|string',
            ]);

            Company::find($this->myId)->update($validateData);

            session()->flash('success', 'Data Saved.');
        }
        $this->emit('modal');
        $this->emit('refresh');
    }
}
