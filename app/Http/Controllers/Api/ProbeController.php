<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Probe;
use Carbon\Carbon;


class ProbeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $currentTime = Carbon::now();
        $data = new Probe();
        $data->probeId=(int)$request->probeId;
        $data->harddiskdrive=(int)$request->harddisk;
        $data->status=0;
        $data->register = $currentTime;
        $data->note=$request->note;
        $data->type=(int)$request->probetype;
        $result = $data->save();


        
        return $result;
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        if($id){
            $score = probe::select('id','probeId','owner','harddiskdrive','status','type')->find($id);
        }else{
            $score = probe::select('id','probeId','owner','harddiskdrive','status','type')->get();
        }
        if($score) {
            return response()->json($score);
         } else {
            return response()->error('error');
         }
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
