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
}

