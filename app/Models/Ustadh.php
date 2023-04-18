<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ustadh extends Model
{
    use HasFactory;
    protected $table = 'ustadh';
    protected $guarded = ['id'];

    public $timestamps = false;

    public function jadwalajar()
    {
        return $this->hasMany(JadwalAjar::class,'id');
    } 
}
