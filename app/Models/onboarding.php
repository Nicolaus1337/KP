<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class onboarding extends Model
{
    use HasFactory;

    protected $table = 'onboardings';
    protected $fillable = [
        'judul', 'status', 'start', 'end', 'created_by', 'onboarding_image', 'description'
    ];
    
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function contents()
    {
        return $this->belongsToMany(Content::class, 'onboarding_contents');
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'onboarding_participants')->withPivot('status');
    }

    public function contents2()
    {
        return $this->belongsToMany(Content::class, 'onboarding_participant_contents')->withPivot('status');
    }

    public function participants2()
    {
        return $this->belongsToMany(User::class, 'onboarding_participant_contents')->withPivot('status');
    }

    

}
