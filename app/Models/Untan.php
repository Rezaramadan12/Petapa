<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Untan extends Model
{
    use HasFactory;

    protected $table = 'untans';
    protected $guarded =[

    ];
    protected $hidden = [];
    // protected $fillable = [
    //     'id', 'lokasi', 'volumeorganik', 'volumenonorganik',
    //     'volumeB3'
    // ];
}
