<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guide extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'guides';
    protected $fillable =[
        "content_id",
        'content_name'
    ];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }
   
}
