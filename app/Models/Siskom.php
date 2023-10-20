<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siskom extends Model
{
    use HasFactory;
    protected $table = 'siskom';
    protected $guarded =[];
    protected $hidden = [];

    public function tps1()
    {
        return $this->belongsTo(Sensor::class, 'id_sensor');
    }
}
