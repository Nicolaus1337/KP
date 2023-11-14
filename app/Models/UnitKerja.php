<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnitKerja extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'unit_kerja';
   
    protected $fillable = [
        'kode_unit_kerja',
        'nama_unit_kerja'
    ];
    
    public function user()
    {
        return $this->hasOne(User::class, 'unit_kerja', 'nama_unit_kerja');
    }
}
