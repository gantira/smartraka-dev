<?php

namespace App\Http\Livewire\Users;

use App\Models\Company;
use App\Models\Education;
use App\Models\Gender;
use App\Models\Marital;
use App\Models\JobTitle;
use App\Models\Religion;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
class Index extends Component
{
    use WithPagination;
    
    public $pagination = 9;
    public $searchTerms;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refresh' => '$refresh', 'destroy'];

    public function render()
    {
        return view('livewire.users.index', [
            'selectGenders' => Gender::all(),
            'selectCompanies' => Company::all(),
            'selectReligions' => Religion::all(),
            'selectMaritals' => Marital::all(),
            'selectEducations' => Education::all(),
            'selectJobTitles' => JobTitle::all(),
            'selectRoles' => collect(Role::all())->reject(function ($value, $key) {
                return $value['name'] == 'super-admin';
            }),
            'users' => User::orWhere('name', 'like', '%' . $this->searchTerms . '%')->paginate($this->pagination)
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

    public function destroy(User $user)
    {
        Storage::delete('/public/profiles/' . $user->image);

        $user->delete();
    }
}
