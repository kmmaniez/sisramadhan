<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;
    protected $table = 'warga';
    protected $guarded = ['id'];
    // protected $with = ['bukbers'];
    public $timestamps = false;

    // public function tadarus()
    // {
    //     return $this->hasMany(Tadarus::class,'id');
    // }
    // public function takbiran()
    // {
    //     return $this->hasOne(Takbiran::class,'id');
    // }
    
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
// ------------------
    public function takjils()
    {
        return $this->belongsToMany(Konsumsi::class, 'takjil_warga');
    }
    public function jaburs()
    {
        return $this->belongsToMany(Konsumsi::class, 'jabur_warga');
    }
    public function bukbers()
    {
        return $this->belongsToMany(Konsumsi::class, 'bukber_warga');
    }



    public function takbirans()
    {
        return $this->belongsToMany(Takbiran::class, 'takbiran_warga');
    }
}
