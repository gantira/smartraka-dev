<?php

namespace App\Http\Livewire\Signatures;

use App\Models\Signature;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = ['refresh' => '$refresh', 'destroy'];
    
    public function render()
    {
        $signatures = Signature::whereHas('user.company', function ($query) {
            return $query->where('id', '=', auth()->user()->company->id);
        })->get();

        return view('livewire.signatures.index', [
            'signatures' => $signatures
        ]);
    }

    public function destroy(Signature $signature)
    {
        $signature->delete();

    }
}
