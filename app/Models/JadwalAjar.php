<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalAjar extends Model
{
    use HasFactory;
    protected $table = 'jadwal_ajar';
    protected $guarded = ['id'];
    protected $with = ['ustadh'];
    public $timestamps = false;

    public function ustadh()
    {
        return $this->belongsTo(Ustadh::class,'id_ustadh');
    } 
}
