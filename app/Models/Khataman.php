<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khataman extends Model
{
    use HasFactory;
    protected $table = 'khataman_nuzulul';
    protected $guarded = ['id'];

    public $timestamps = false;
}
