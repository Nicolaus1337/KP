<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'npk',
        'name',
        'unit_kerja',
        'email',
        'password'
        

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed'
    ];

    public function unitKerja()
    {
        return $this->belongsTo(UnitKerja::class, 'unit_kerja', 'nama_unit_kerja');
    }

    public function onboardings()
    {
        return $this->belongsToMany(onboarding::class, 'onboarding_participants')->withPivot('status');
    }

    public function onboardings2()
    {
        return $this->belongsToMany(onboarding::class, 'onboarding_participant_contents')->withPivot('status');
    }
   
    public function contents2()
    {
        return $this->belongsToMany(Content::class, 'onboarding_participant_contents')->withPivot('status');
    }
    
}
