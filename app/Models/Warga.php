<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;
    protected $table = 'warga';
    protected $guarded = ['id'];

    public $timestamps = false;

    // public function tadarus()
    // {
    //     return $this->hasMany(Tadarus::class,'id');
    // }
    public function takbiran()
    {
        return $this->hasOne(Takbiran::class,'id');
    }
    
    public function imam()
    {
        return $this->hasOne(Tarawih::class,'id');
    }
    
    public function penceramah()
    {
        return $this->hasOne(Tarawih::class,'id');
    }
    
    public function bilal()
    {
        return $this->hasOne(Tarawih::class,'id');
    }
}
