<?php

namespace App\Http\Livewire\Settings;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $searchTerms;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refresh' => '$refresh', 'destroy'];

    public function render()
    {
        return view('livewire.settings.index', [
            'settings' => Setting::all()
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
        Setting::find($id)->delete();
    }
}
