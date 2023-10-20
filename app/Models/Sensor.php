<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;
    protected $table = 'master_sensor';
    protected $guarded =[

    ];
    protected $hidden = [];

    public function siskom(){
        return $this->hasMany(Siskom::class, 'id_sensor');
    }
}
