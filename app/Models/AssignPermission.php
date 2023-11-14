<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssignPermission extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = false;
    protected $table = 'role_has_permissions';

    protected $primaryKey = 'role_id';
    protected $fillable = [
        'role_id',
        'permission_id'
    ];
}

