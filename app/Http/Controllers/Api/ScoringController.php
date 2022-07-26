<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\scoringdata;
use Illuminate\Http\Request;

class ScoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scoring = scoringdata::all();
        return response()->json($scoring);
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
        $request->validate([
            'id_from' => 'required',
            'id_to' => 'required|different:id_from',
            'quality' => 'required|numeric|between:1,5',
            'relation' => 'required|numeric|between:1,5',
            'speed' => 'required|numeric|between:1,5',
            'kelebihan' => 'required',
            'kurang' => 'required',
            'additional_info' => 'required',
        ]);
        $scoringdata = new scoringdata();
        $scoringdata->id_from = $request->id_from;
        $scoringdata->id_to = $request->id_to;
        $scoringdata->quality = $request->quality;
        $scoringdata->relation = $request->relation;
        $scoringdata->speed = $request->speed;
        $scoringdata->kelebihan = $request->kelebihan;
        $scoringdata->kurang = $request->kurang;
        $scoringdata->additional_info = $request->additional_info;
        $scoringdata->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\scoringdata  $scoringdata
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request)
    {
        $scoringdata = scoringdata::where('id_to', $request->id)->get();
        return response()->json($scoringdata);
    }

    public function check_available(Request $request){
        $scoringdata = scoringdata::where('id_from', $request->id_from)->where('id_to', $request->id_to)->get();
        if(count($scoringdata) > 0){
            return response()->json(['status' => 'failed', 'message' => 'Data already exist']);
        }else{
            return response()->json(['status' => 'success', 'message' => 'Go Ahead']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\scoringdata  $scoringdata
     * @return \Illuminate\Http\Response
     */
    public function edit(scoringdata $scoringdata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\scoringdata  $scoringdata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, scoringdata $scoringdata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\scoringdata  $scoringdata
     * @return \Illuminate\Http\Response
     */
    public function destroy(scoringdata $scoringdata)
    {
        //
    }
}
