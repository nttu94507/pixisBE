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
                $customer['Maintenance_Agreement_at'] = $value->Maintenance_Agreement_at ? $value->Maintenance_Agreement_at : '尚未成交';

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
            $data->note = $request->note ? $request->note : '';
            $data->order_at = $request->order_at ? $request->order_at : null;
            $data->Maintenance_Agreement_at = $request->Maintenance_Agreement_at ? $request->Maintenance_Agreement_at : null;
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
                $customer['Maintenance_Agreement_at'] = $value->Maintenance_Agreement_at ? $value->Maintenance_Agreement_at : '尚未成交';
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

    public function update(Request $request)
    {

        if ($request->id) {

            // $currentTime = Carbon::now();
            $customer = customer::find($request->id);
            if ($customer) {
                $customer->Organization_Name = $request->Organization_Name;
                $customer->Organization_Address = $request->Organization_Address;
                $customer->note = $request->note ? $request->note : '';
                $customer->contractPerson = $request->contractPerson;
                $customer->contractPerson_PhoneNumber = $request->contractPerson_PhoneNumber;
                $customer->contractPerson_Email = $request->contractPerson_Email;
                $customer->SalesID = $request->SalesID;
                $customer->FAEID = $request->FAEID;
        
                $result = $customer->update();
            }

            return $result;

        }

    }

    //
}