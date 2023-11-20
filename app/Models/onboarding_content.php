<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class onboarding_content extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function onboardingParticipant()
    {
        return $this->belongsToMany(onboarding_participant::class, 'onboarding_participant_contents');
    }
}
