<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable =[
        'title',
        'type',
        'description',
        'visibility'

    ];

    public function images()
    {
        return $this->hasMany(ContentImage::class);
    }

    public function guides()
    {
        return $this->hasOne(Guide::class);
    }

    public function onboardings()
    {
        return $this->belongsToMany(onboarding::class, 'onboarding_content');
    }

    public function onboardings2()
    {
        return $this->belongsToMany(onboarding::class, 'onboarding_participant_contents')->withPivot('status');
    }

    public function participants2()
    {
        return $this->belongsToMany(User::class, 'onboarding_participant_contents')->withPivot('status');
    }

}

