<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tadarus extends Model
{
    use HasFactory;
    protected $table = 'tadarus';
    protected $guarded = ['id'];

    // protected $with = ['kelompok'];
    // public $timestamps = false;

    // public function kelompok()
    // {
    //     return $this->belongsTo(KelTadarus::class, 'id_kel_tadarus');
    // }

    // public function warga()
    // {
    //     return $this->belongsTo(Warga::class,'id_warga');
    // }
}