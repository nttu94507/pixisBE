<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $id = $request?$request->id:false;

        if ($id) {
            $score = Employee::select('*')->where('id', '=', $id)->get();
        } else {
            $score = Employee::select('*')->get(); 
        }
        if ($score) {
            foreach ($score as $key => $value) {
                $customer = [];
                $customer['id'] = $value->id;
                $customer['name'] = $value->Name;
                $customer['department'] = $value->Department;
                $result[] = $customer;
            }

            if ($result) {
                return response()->json($result);
            } else {
                return response()->json([]);
            }
        }
    } 
    public function store(Request $request)
    {
        $result = Employee::firstOrnew(['Name' => $request->employee_Name]);
        if ($result->exists) {
            return 0;
        } else {
            $result->Name = $request->employee_Name;
            $result->Department = $request->department;
            $d = $result->save();
            return $d; 
        }
    }
    
    public function update (Request $request)
    {
        $employe = Employee::find($request->id);
        if ($employe) {
            $employe->Name = $request->Name;
            $employe->Department = $request->Department;
            $employe->note = $request->note;
            $d = $employe->save();
            return $d; 
        }
    }
}

