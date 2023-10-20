<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyAPI extends Controller
{
    //
    function getData()
    {
        return["name"=>"reza","email"=>"rez@student.untan.ac.id","address"=>"melawi"];
    }
}
