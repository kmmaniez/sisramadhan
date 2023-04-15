<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarawih extends Model
{
    use HasFactory;
    protected $table = 'tarawih';
    protected $guarded = ['id'];
    protected $with = ['imam','penceramah','bilal'];

    public function imam()
    {
        return $this->belongsTo(Warga::class,'id_imam');
    }
    
    public function penceramah()
    {
        return $this->belongsTo(Warga::class,'id_penceramah');
    }
    
    public function bilal()
    {
        return $this->belongsTo(Warga::class,'id_bilal');
    }
}
