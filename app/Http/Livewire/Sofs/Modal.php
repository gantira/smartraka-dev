<?php

namespace App\Http\Livewire\Sofs;

use App\Models\Sof;
use Livewire\Component;

class Modal extends Component
{
    public $myId;
    public $price;
    public $description;
    public $status;
    public $comment;
    public $sof;
    public $editMode = false;

    protected $listeners = ['edit', 'add'];

    public function render()
    {
        return view('livewire.sofs.modal');
    }

    public function add()
    {
        $this->reset();

        $this->editMode = false;

        $this->emit('modal');
    }

    public function edit(Sof $sof)
    {
        $this->editMode = true;

        $this->fill($sof);
        $this->sof = $sof;

        $this->emit('modal');
    }

    public function submit()
    {
        if (!$this->editMode) {

            $this->validate([
                'price' => 'required|numeric',
                'description' => 'required|max:255',
                'comment' => 'nullable|string|max:255',
            ]);

            Sof::create([
                'company_id' => auth()->user()->company->id,
                'price' => $this->price,
                'description' => $this->description,
                'status' => 0,
                'comment' => $this->comment,
            ]);

            session()->flash('success', 'Data Saved.');
        } else {

            $this->validate([
                'price' => 'required|numeric',
                'description' => 'required|max:255',
                'status' => 'required|in:0,1,2,3',
                'comment' => 'nullable|string|max:255',
            ]);

            $this->sof->update([
                'company_id' => auth()->user()->company->id,
                'price' => $this->price,
                'description' => $this->description,
                'status' => $this->status,
                'comment' => $this->comment,
            ]);

            session()->flash('success', 'Data Saved.');
        }

        $this->emit('modal');
        $this->emit('refresh');
    }

    public function getShowProperty()
    {
        return ($this->sof && in_array($this->sof->status, ['2','3']));
    }

}
