<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tag';
    protected $fillable =[
        "name"
       
    ];

    
    public function guide()
    {
        return $this->belongsToMany(Guide::class);
    }
}
