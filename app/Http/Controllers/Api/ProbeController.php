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
        $data->harddiskdrive=$request->Storage;
        $data->status=0;
        $data->register = $currentTime;
        $data->note=$request->note;
        $data->type=$request->Probetype;
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
            $score = probe::select('id','probeId','owner','harddiskdrive','status','type','note')->where('id','=',$id)->get();
            // $score = probe::first($id);
        }else{
            $score = probe::select('id','probeId','owner','harddiskdrive','status','type','note')->get();
        }
        $result = [];
        foreach($score as $key=>$value){
            $probe= [];
            // dd($value);
            $probe['id'] = $value->id;
            $probe['probeId'] = $value->probeId;
            $probe['note'] = $value->note;
            switch($value->owner){
                case null:
                    $probe['owner'] = '暫無持有者';
                    break;
            }
            switch($value->harddiskdrive){
                case 0:
                    $probe['harddiskdrive']='8GB';
                    break;
                case 1:
                    $probe['harddiskdrive']='16GB';
                    break;
            }
            switch($value->type){
                case 0:
                    $probe['type']='P110';
                    break;
                case 1:
                    $probe['type']='P120';
                case 2:
                    $probe['type']='P220';

            }
            switch($value->status){
                case 0:
                    $probe['status']='在庫';
            }
            $result[]=$probe;
            // dd($result);
        }
        if($result) {
            // if($id){
            //     return response()->json($result[0]);
            // }else{
            //     return response()->json($result);
            // }
            return response()->json($result);
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
    public function update(Request $request)
    {
        $id = $request->id;
        $data['probeId'] = $request->probeId;
        $data['status'] = $request->stattus;
        $data['owner'] = null;
        $data['harddiskdrive'] = $request->harddiskdrive;
        $data['type'] = $request->probetype;
        $data['note'] = $request->note;
        
        if($id){
            $target  = Probe::where('id','=',$id);
            $$result = $target->update($data);

            return response()->json($result);
        }else{
            return response()->json('0');
        }
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
        $probe = Probe::find($id);
        $result = $probe->delete();
        return $result ;
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function readinfo($id)
    {
        
        if($id){
            $score = probe::select('id','probeId','owner','harddiskdrive','status','type','note')->where('id','=',$id)->first();
        }
        if($score) {
            return response()->json($score);
        } else {
            return response()->error('error');
        }
        //
    }
}
