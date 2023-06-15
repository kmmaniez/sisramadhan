<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumsi extends Model
{
    use HasFactory;
    protected $table = 'konsumsi';
    protected $guarded = ['id'];
    protected $with = ['takjils','jaburs','bukbers'];

    public function takjils()
    {
        return $this->belongsToMany(Warga::class, 'takjil_warga');
    }
    public function jaburs()
    {
        return $this->belongsToMany(Warga::class, 'jabur_warga');
    }
    public function bukbers()
    {
        return $this->belongsToMany(Warga::class, 'bukber_warga');
    }
    // public function konsumsibukber()
    // {
    //     return $this->belongsToMany(Warga::class, 'konsumsi_warga', 'warga_bukber_id','konsumsi_id');
    // }
    
}
