<?php

namespace App\Http\Livewire\Users;

use App\Models\Company;
use App\Models\Education;
use App\Models\Gender;
use App\Models\Marital;
use App\Models\JobTitle;
use App\Models\Religion;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class Modal extends Component
{
    use WithFileUploads;

    public $user;
    public $company_id;
    public $religion_id;
    public $marital_id;
    public $education_id;
    public $gender_id;
    public $job_title_id;
    public $name;
    public $email;
    public $password = null;
    public $password_confirmation;
    public $id_card;
    public $phone;
    public $dob;
    public $image;
    public $updated_image;
    public $foto_preview;
    public $role_names = [];
    public $editMode = false;

    protected $listeners = ['edit', 'add'];

    public function render()
    {
        return view('livewire.users.modal', [
            'selectGenders' => Gender::all(),
            'selectCompanies' => Company::all(),
            'selectReligions' => Religion::all(),
            'selectMaritals' => Marital::all(),
            'selectEducations' => Education::all(),
            'selectJobTitles' => JobTitle::all(),
            'selectRoles' => collect(Role::all())->reject(function ($value, $key) {
                return $value['name'] == 'super-admin';
            }),
        ]);
    }

    public function add()
    {
        $this->reset();
        $this->resetValidation();

        $this->editMode = false;

        $this->emit('modal');
    }

    public function edit(User $user)
    {
        $this->editMode = true;
        $this->resetValidation();

        $this->fill($user);
        $this->user = $user;
        $this->role_names = $user->getRoleNames();

        $this->emit('modal');
    }

    public function submit()
    {
        $path = storage_path('app/public/profiles');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path);
        }

        if (!$this->editMode) {
            // Add

            $validateData = $this->validate([
                'company_id' => 'required|exists:companies,id',
                'religion_id' => 'nullable|exists:religions,id',
                'marital_id' => 'nullable|exists:maritals,id',
                'education_id' => 'nullable|exists:education,id',
                'gender_id' => 'nullable|exists:genders,id',
                'job_title_id' => 'required|exists:job_titles,id',
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'id_card' => 'nullable',
                'phone' => 'nullable|string',
                'dob' => 'nullable',
                'role_names' => 'nullable|array|exists:roles,name',
                'image' => 'nullable|mimes:jpg,png,jpeg',
                'password' => 'nullable|min:8|confirmed',
            ]);

            if ($this->image) {
                $fileName = Carbon::now()->timestamp .  '-' . $this->name . '.' . $this->image->getClientOriginalExtension();
                Image::make($this->image)->save($path . '/' . $fileName, 70);
                $validateData['image'] = $fileName;
            }

            $validateData['password'] = $this->password ? bcrypt($this->password) : bcrypt('secret');

            $user = User::create($validateData);
            $user->syncRoles($this->role_names);

            session()->flash('success', 'Data Saved.');
        } else {
            // Edit
            $validateData = $this->validate([
                'company_id' => 'required|exists:companies,id',
                'religion_id' => 'nullable|exists:religions,id',
                'marital_id' => 'nullable|exists:maritals,id',
                'education_id' => 'nullable|exists:education,id',
                'gender_id' => 'nullable|exists:genders,id',
                'job_title_id' => 'required|exists:job_titles,id',
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email,' . $this->user->id,
                'id_card' => 'nullable',
                'phone' => 'nullable|string',
                'dob' => 'nullable',
                'role_names' => 'nullable|array|exists:roles,name',
                'updated_image' => 'nullable|mimes:jpg,png,jpeg',
                'password' => 'nullable|min:8|confirmed',
            ]);

            if ($this->updated_image) {
                Storage::delete('/public/profiles/' . $this->user->image);

                $fileName = Carbon::now()->timestamp .  '-' . $this->name . '.' . $this->updated_image->getClientOriginalExtension();
                Image::make($this->updated_image)->save($path . '/' . $fileName, 70);
                $validateData['image'] = $fileName;
            }

            $validateData['password'] = $this->password ? bcrypt($this->password) : $this->user->password;

            $this->user->update($validateData);
            $this->user->syncRoles($this->role_names);

            session()->flash('success', 'Data Saved.');
        }
        $this->emit('modal');
        $this->emit('refresh');

        $this->reset();
        $this->resetValidation();
    }

    public function getShowPasswordProperty()
    {
        return count($this->role_names);
    }
}
