<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Permission as PermissionSpatie;

class Permission extends PermissionSpatie
{
    use HasFactory,SoftDeletes;
}
