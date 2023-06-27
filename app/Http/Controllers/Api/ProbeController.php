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
        // dd($request);
        $currentTime = Carbon::now();
        $data = new Probe();
        $data->probeId = $request->probeId;
        $data->harddiskdrive = $request->harddiskdrive;
        $data->status = 1;
        $data->price=$request->price;
        $data->register = $currentTime;
        $data->manufacture = $request->manufacture;
        $data->note = $request->note;
        $data->type = $request->probetype;
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
        // dd(123);
        $id = $request->id;
        // dd($id);
        if ($id) {
            $score = probe::select('*')->where('id', '=', $id)->get();
            // $score = probe::first($id);
        } else {
            $score = probe::select('*')->get();
        }
        $result = [];
        // dd($score);
        if ($score) {
            foreach ($score as $key => $value) {
                $probe = [];
                // dd($value);
                $probe['id'] = $value->id;
                $probe['probeId'] = $value->probeId;
                $probe['note'] = $value->note;
                if ($value->owner == 0) {
                    $probe['ownerName'] = '無';
                } else {
                    $probe['ownerName'] = $value->ownerName;
                }
                switch ($value->harddiskdrive) {
                    case 0:
                        $probe['harddiskdrive'] = '8GB';
                        break;
                    case 1:
                        $probe['harddiskdrive'] = '16GB';
                        break;
                }
                $probe['hddcode'] = $value->harddiskdrive;
                switch ($value->type) {
                    case 0:
                        $probe['type'] = 'P110';
                        $probe['typecode'] = '0';
                        break;
                    case 1:
                        $probe['type'] = 'P120';
                        $probe['typecode'] = '1';
                        break;
                    case 2:
                        $probe['type'] = 'P220';
                        $probe['typecode'] = '2';
                        break;
                    case 3:
                        $probe['type'] = 'P360';
                        $probe['typecode'] = '3';
                        break;
                    case 4:
                        $probe['type'] = 'P560';
                        $probe['typecode'] = '4';
                        break;
                    case 5:
                        $probe['type'] = 'P110+';
                        $probe['typecode'] = '5';
                        break;
                }
                switch ($value->status) {
                    case 0:
                        $probe['status'] = '出貨';
                        break;
                    case 1:
                        $probe['status'] = '庫存';
                        break;
                    case 2:
                        $probe['status'] = '預留';
                        break;
                    case 3:
                        $probe['status'] = '借測';
                        break;
                    case 4:
                        $probe['status'] = '故障';
                        break;
                    case 5:
                        $probe['status'] = '內借';
                        break;
                }
                $probe['statuscode'] = $value->status;
                $probe['price'] = $value->price;
                $probe['manufacture'] = $value->manufacture->format('Y/m/d');
                $probe['createdate'] = $value->created_at->format('Y/m/d');
                $probe['lastupdate'] = $value->updated_at->format('Y/m/d H:i:s');
                $result[] = $probe;
            }
            if ($result) {
                return response()->json($result);
            } else {
                return response()->json([]);
            }
        } else {
            return response()->json([]);
        }
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
        return $result;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateprobe(Request $request)
    {

        if ($request->id) {

            $currentTime = Carbon::now();
            $probe = probe::find($request->id);
            $probe->note = $request->note;
            $probe->harddiskdrive = $request->harddiskdrive;
            $result = $probe->update();
            return $result;

        }
        
    }
}