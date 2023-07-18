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
        // dd($request);
        $currentTime = Carbon::now();
        $data = new Customer();
        $data->GUInumber = $request->GUInumber;
        $data->Organization_Name = $request->Organization_Name;
        $data->Organization_Address = $request->Organization_Address;
        $data->contactPerson = $request->contractPerson;
        $data->contactPerson_Email = $request->contractPerson_Email;
        $data->contactPerson_PhoneNumber = $request->contractPerson_Phonenumber;
        $data->status = 0;
        $data->FAEID = $request->FAEID;
        $data->SalesID = $request->SalesID;
        $data->note = $request->note;
        $data->register_at = $currentTime;
        //  $data->transfer_at = $request->probetype;
        $result = $data->save();



        return $result;
        //
    }
    //
}