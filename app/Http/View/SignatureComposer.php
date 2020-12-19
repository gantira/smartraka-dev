<?php

namespace App\Http\View;

use App\Models\Signature;
use Illuminate\View\View;

class SignatureComposer
{
    public function compose(View $view)
    {
        $signature = Signature::whereHas('user.company', function ($query) {
            return $query->where('name', '=', auth()->user()->company->name);
        })->get();

        $view->with('signatures', $signature);
    }
}
