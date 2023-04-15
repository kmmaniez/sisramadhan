<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Takbiran extends Model
{
    use HasFactory;
    protected $table = 'takbiran';
    protected $guarded = ['id'];
    protected $with = ['warga'];
    // public $timestamps = false;
    
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'id_warga');
    }
}
