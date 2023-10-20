<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Polnep;
use Illuminate\Http\Request;

class polnepsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postedgepolnep(Request $request)
    {
            Polnep::create([
                'volumeorganik' => $request -> volumeorganik,
                'volumenonorganik' => $request -> volumenonorganik,
                'volumeB3' => $request -> volumeB3,
                'volumetotaledge' => number_format(($request->volumeorganik + $request->volumenonorganik + $request->volumeB3 ) /3,2),
                // 'status' => 'pending'
            ]);
            return response()->json('success');
    }
    public function index()
    {
        //
        $title = "Polnep";
        $polnep = Polnep::all();

        return view('data-realtime.polnep', compact('title', 'polnep'));
        $data = Polnep::latest()->first();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = Polnep::latest()->first();
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
