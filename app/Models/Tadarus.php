<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tadarus extends Model
{
    use HasFactory;
    protected $table = 'tadarus';
    protected $guarded = ['id'];

    protected $with = ['wargas'];

    public function wargas()
    {
        return $this->belongsToMany(Warga::class,'tadarus_warga');
    }
}
