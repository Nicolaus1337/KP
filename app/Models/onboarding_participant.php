<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class onboarding_participant extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function onboardingContent()
    {
        return $this->belongsToMany(onboarding_content::class, 'onboarding_participant_contents');
    }
}
