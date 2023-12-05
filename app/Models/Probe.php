<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Probe extends Model
{
    use SoftDeletes;
    protected $table = 'probes';
    protected $dates = [
        'created_at',
        'updated_at',
        'manufacture',
        'register',
    ];
    protected $fillable = ['probeId'];
    // use HasFactory;

    
}
