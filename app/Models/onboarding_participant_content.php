<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class onboarding_participant_content extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function onboardingContent()
    {
        return $this->belongsTo(onboarding_content::class, 'onboarding_content_id');
    }
}
