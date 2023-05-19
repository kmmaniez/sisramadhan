<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontribusiWarga extends Model
{
    use HasFactory;
    protected $table = 'kontribusi_warga';
    protected $guarded = ['id'];
    public $timestamps = false;
}
