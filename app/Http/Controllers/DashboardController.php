<?php

namespace App\Http\Controllers;
use App\Models\Polnep;
use App\Models\Rusunawa;
use App\Models\Siskom;
use App\Models\UMP;
use App\Models\Untan;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $title = "Dashboard";
        $data['untan'] = Untan::orderBy('id', 'DESC')->first();
        $data['polnep'] = Polnep::orderBy('id', 'DESC')->first();
        $data['ump'] = UMP::orderBy('id', 'DESC')->first();
        $data['rusunawa'] = Rusunawa::orderBy('id', 'DESC')->first();
        $data['siskom_tps1'] = Siskom::where('id_sensor', 1)
            ->orderBy('id', 'DESC')
            ->first();
        $data['siskom_tps2'] = Siskom::where('id_sensor', 2)
            ->orderBy('id', 'DESC')
            ->first();
        $data['total_siskom'] =
            ($data['siskom_tps1']->kapasitas +
                $data['siskom_tps2']->kapasitas) /
            2;

        return view('dashboard.dashboard', $data, compact('title'));
    }
}
