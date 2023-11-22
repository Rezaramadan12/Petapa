<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Siskom;
use Illuminate\Http\Request;

class SiskomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getedgesiskom(Request $request)
    {
        Siskom::create([
            'id_sensor' => $request->id_sensor,
            'kapasitas' => $request->kapasitas,
        ]);
        return response()->json('success');
    }
    public function index()
    {
        //

        $title = 'Siskom';
        $dataSiskom = Siskom::with('tps1')
            ->whereIn('id_sensor', [1, 2])
            ->get();
        $totaltps1 = Siskom::where('id_sensor', 1)->count();
        $totaltps2 = Siskom::where('id_sensor', 2)->count();

        if ($totaltps1 < $totaltps2) {
            $tps1 = Siskom::where('id_sensor', 1)
                ->get()
                ->take($totaltps1);
            $tps2 = Siskom::where('id_sensor', 2)
                ->get()
                ->take($totaltps1);
        } elseif ($totaltps1 > $totaltps2) {
            $tps1 = Siskom::where('id_sensor', 1)
                ->get()
                ->take($totaltps2);
            $tps2 = Siskom::where('id_sensor', 2)
                ->get()
                ->take($totaltps2);
        }

        return view(
            'data-realtime.siskom',
            compact('title', 'dataSiskom', 'tps1', 'tps2')
        );

        $dataSiskom = Siskom::latest()->first();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
