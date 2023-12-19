<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;

class CustomerController extends Controller
{

    public function index(Request $request)
    {
        $id = $request->id;
        // dd(123);
        if ($id) {
            $score = Customer::select('*')->where('id', '=', $id)->get();
            // $score = probe::first($id);
        } else {
            $score = Customer::select('*')->get();
            // dd($score);   
        }
        $result = [];

        if ($score) {
            foreach ($score as $key => $value) {
                $customer = [];
                // dd($value);
                $customer['id'] = $value->id;
                $customer['GUInumber'] = $value->GUInumber;
                $customer['Organization_Name'] = $value->Organization_Name;
                $customer['contractPerson'] = $value->contractPerson;
                $customer['contractPerson_PhoneNumber'] = $value->contractPerson_PhoneNumber;
                $customer['status'] = $value->status;
                $customer['FAEID'] = $value->FAEID;
                $customer['note'] = $value->note;
                $customer['SalesID'] = $value->SalesID;
                $customer['Maintenance_Agreement_at'] = $value->Maintenance_Agreement_at?$value->Maintenance_Agreement_at:'尚未成交';
                // if ($value->owner == 0) {
                //     $probe['ownerName'] = '無';
                // } else {
                //     $probe['ownerName'] = $value->ownerName;
                // }
                // switch ($value->harddiskdrive) {
                //     case 0:
                //         $probe['harddiskdrive'] = '8GB';
                //         break;
                //     case 1:
                //         $probe['harddiskdrive'] = '16GB';
                //         break;
                // }
                // $probe['hddcode'] = $value->harddiskdrive;
                // switch ($value->type) {
                //     case 0:
                //         $probe['type'] = 'P110';
                //         $probe['typecode'] = 0;
                //         break;
                //     case 1:
                //         $probe['type'] = 'P120';
                //         $probe['typecode'] = 1;
                //         break;
                //     case 2:
                //         $probe['type'] = 'P220';
                //         $probe['typecode'] = 2;
                //         break;
                //     case 3:
                //         $probe['type'] = 'P360';
                //         $probe['typecode'] = 3;
                //         break;
                //     case 4:
                //         $probe['type'] = 'P560';
                //         $probe['typecode'] = 4;
                //         break;
                //     case 5:
                //         $probe['type'] = 'P110+';
                //         $probe['typecode'] = 5;
                //         break;
                // }
                // switch ($value->status) {
                //     case 0:
                //         $probe['status'] = '出貨';
                //         break;
                //     case 1:
                //         $probe['status'] = '庫存';
                //         break;
                //     case 2:
                //         $probe['status'] = '預留';
                //         break;
                //     case 3:
                //         $probe['status'] = '借測';
                //         break;
                //     case 4:
                //         $probe['status'] = '故障';
                //         break;
                //     case 5:
                //         $probe['status'] = '內借';
                //         break;
                // }
                // $probe['statuscode'] = $value->status;
                // $probe['price'] = $value->price != ''?$value->price:'';
                // $probe['manufacture'] = $value->manufacture->format('Y/m/d');
                // $probe['createdate'] = $value->created_at->format('Y/m/d');
                // $probe['lastupdate'] = $value->updated_at->format('Y/m/d H:i:s');
                $result[] = $customer;
            }
            // dd($result);
            if ($result) {
                return response()->json($result);
            } else {
                return response()->json([]);
            }
        } else {
            return response()->json([]);
        }
    

       
        // $score = Customer::select('*')->get();
        // return response()->json($score);
        //
    }

    public function store(Request $request)
    {
        $currentTime = Carbon::now();
        $data = Customer::firstOrnew(['GUInumber' => $request->GUInumber]);
        // dd($data);
        if ($data->exists) {
            // dd($data->exists);
            return 0;
        } else {
            // "firstOrCreate" found the user in the DB and fetched it.
            // dd($data->exists);
            $data->GUInumber = $request->GUInumber;
            $data->Organization_Name = $request->Organization_Name;
            $data->Organization_Address = $request->Organization_Address;
            $data->contractPerson = $request->contractPerson;
            $data->contractPerson_Email = $request->contractPerson_Email;
            $data->contractPerson_PhoneNumber = $request->contractPerson_PhoneNumber;
            $data->status = 0;
            $data->FAEID = $request->FAEID;
            $data->SalesID = $request->SalesID;
            $data->note = $request->note?$request->note:'';
            $data->order_at = $request->order_at?$request->order_at:null;
            $data->Maintenance_Agreement_at = $request->Maintenance_Agreement_at?$request->Maintenance_Agreement_at:null;
            //  $data->transfer_at = $request->probetype;
            $result = $data->save();
            return $result;
        }

        //
    }

    public function detail(Request $request)
    {
        $id = $request->id;
        // dd(123);
        if ($id) {
            $score = Customer::select('*')->where('id', '=', $id)->get();
            // $score = probe::first($id);
        } else {
            $score = Customer::select('*')->get();
            // dd($score);   
        }
        $result = [];

        if ($score) {
            foreach ($score as $key => $value) {
                $customer = [];
                // dd($value);
                $customer['id'] = $value->id;
                $customer['GUInumber'] = $value->GUInumber;
                $customer['Organization_Name'] = $value->Organization_Name;
                $customer['contractPerson'] = $value->contractPerson;
                $customer['contractPerson_PhoneNumber'] = $value->contractPerson_PhoneNumber;
                $customer['Organization_Address'] = $value->Organization_Address;
                $customer['contractPerson_Email'] = $value->contractPerson_Email;
                $customer['status'] = $value->status;
                $customer['FAEID'] = $value->FAEID;
                $customer['note'] = $value->note;
                $customer['SalesID'] = $value->SalesID;
                $customer['Maintenance_Agreement_at'] = $value->Maintenance_Agreement_at?$value->Maintenance_Agreement_at:'尚未成交';
                $result[] = $customer;
            }
            // dd($result);
            if ($result) {
                return response()->json($result);
            } else {
                return response()->json([]);
            }
        } else {
            return response()->json([]);
        }
    }
    //
}