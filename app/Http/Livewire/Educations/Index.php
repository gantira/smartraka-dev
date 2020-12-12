<?php

namespace App\Http\Livewire\Educations;

use App\Models\Education;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $pagination = 9;
    public $searchTerms;


    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refresh' => '$refresh', 'destroy'];

    public function render()
    {
        return view('livewire.educations.index', [
            'educations' => Education::orWhere('name', 'like', '%' . $this->searchTerms . '%')->paginate($this->pagination)
        ]);
    }

    public function showConfirmation($id)
    {
        $this->emit("swal:confirm", [
            'type'        => 'warning',
            'title'       => 'Are you sure?',
            'text'        => "You won't be able to revert this!",
            'confirmText' => 'Yes, delete!',
            'method'      => 'destroy',
            'params'      => $id, // optional, send params to success confirmation
            'callback'    => '', // optional, fire event if no confirmed
        ]);
    }

    public function destroy($id)
    {
        Education::find($id)->delete();
    }
}
