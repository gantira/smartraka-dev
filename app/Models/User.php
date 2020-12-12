<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'company_id',
        'religion_id',
        'marital_id',
        'education_id',
        'gender_id',
        'job_title_id',
        'id_card',
        'phone',
        'dob',
        'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $appends = [
        'foto_preview'
    ];



    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function jobtitle()
    {
        return $this->belongsTo(JobTitle::class);
    }

    public function getCompanyNameAttribute()
    {
        return $this->company->name;
    }

    public function getPositionNameAttribute()
    {
        return $this->jobtitle->name;
    }

    public function getRoleNameAttribute()
    {
        return $this->getRoleNames()->join(',');
    }

    public function getRoleNameTagsAttribute()
    {
        return $this->getRoleNames()->map(function ($item) {
            switch ($item) {
                case 'super-admin':
                    $type = 'info';
                    break;
                case 'kepala cabang':
                    $type = 'warning';
                    break;
                case 'admin':
                    $type = 'success';
                    break;

                default:
                    $type = 'secondary';
                    break;
            }

            return "<span class='tag tag-{$type} mb-1'>{$item}</span>";
        })->sort()->join('<br/>');
    }

    public function getFotoPreviewAttribute()
    {
        return $this->image && !$this->trashed() ? asset('storage/profiles/' . $this->image) : url("https://ui-avatars.com/api/?name={$this->name}&background=f2f2f2");
    }
}
