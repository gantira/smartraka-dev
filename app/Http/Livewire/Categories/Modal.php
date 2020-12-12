<?php

namespace App\Http\Livewire\Categories;

use App\Models\Account;
use App\Models\Category;
use Livewire\Component;

class Modal extends Component
{
    public $myId;
    public $name;
    public $description;
    public $account_id;
    public $editMode = false;

    protected $listeners = ['edit', 'add'];

    protected $rules = [
        'name' => 'required',
        'description' => 'required|string|max:255',
        'account_id' => 'required|exists:accounts,id',
    ];

    public function render()
    {
        return view('livewire.categories.modal', [
            'selectAccounts' => Account::whereNotIn('id', [1])->get()->groupBy('status_label')
        ]);
    }

    public function add()
    {
        $this->reset();

        $this->editMode = false;

        $this->emit('modal');
    }

    public function edit($category)
    {
        $this->editMode = true;

        $this->fill($category);
        $this->myId = $category['id'];

        $this->emit('modal');
    }

    public function submit()
    {
        $this->validate();

        if (!$this->editMode) {

            Category::create([
                'company_id' => 1,
                'name' => $this->name,
                'description' => $this->description,
                'account_id' => $this->account_id,
            ]);

            session()->flash('success', 'Data Saved.');
        } else {

            Category::find($this->myId)->update([
                'company_id' => 1,
                'name' => $this->name,
                'description' => $this->description,
                'account_id' => $this->account_id,
            ]);

            session()->flash('success', 'Data Saved.');
        }
        $this->emit('modal');
        $this->emit('refresh');
    }
}
