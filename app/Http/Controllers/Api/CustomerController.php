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
        $data->Organization_Name = $request->OrganizationName;
        $data->Organization_Address = $request->OrganizationAddress;
        $data->contactPerson = $request->contactPerson;
        $data->contactPerson_Email = $request->contactPersonEmail;
        $data->contactPerson_PhoneNumber = $request->contactPersonPhoneNumber;
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