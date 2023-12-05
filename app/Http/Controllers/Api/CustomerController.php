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
        $score = Customer::select('*')->get();
        return response()->json($score);
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
            $data->order_at = $request->order_at?$request->order_at:'';
            $data->Maintenance_Agreement_at = $request->Maintenance_Agreement_at?$request->Maintenance_Agreement_at:'';
            //  $data->transfer_at = $request->probetype;
            $result = $data->save();
            return $result;
        }

        //
    }
    //
}