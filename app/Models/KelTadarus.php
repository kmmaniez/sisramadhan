<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelTadarus extends Model
{
    use HasFactory;
    protected $table = 'kel_tadarus';
    protected $guarded = ['id'];

    public $timestamps = false;

    // public function tadarus()
    // {
    //     return $this->hasMany(Tadarus::class, 'id_kel_tadarus');
    // }
}
