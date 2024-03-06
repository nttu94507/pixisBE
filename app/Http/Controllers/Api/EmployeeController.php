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
            // $score = probe::first($id);
        } else {
            $score = Employee::select('*')->get();
            // dd($score);   
        }

        return $score;
        // $result = [];

        // if ($score) {
        //     foreach ($score as $key => $value) {

        //     }



        // dd(123);
    }


    public function store(Request $request)
    {
        $employee_Name = $request->employee_Name;
        $result = Employee::firstOrnew(['Name' => $request->employee_Name]);

        if ($result->exists) {
            // $score = Employee::select('*')->where('id', '=', $id)->get();
            return 0;
            // $score = probe::first($id);
        } else {
            // $score = Employee::select('*')->get();
            $result->Name = $request->employee_Name;
            // $result->save();
            $d = $result->save();
            // dd($score);  
            return $d; 
        }
        // $result = [];

        // if ($score) {
        //     foreach ($score as $key => $value) {

        //     }



        // dd(123);
    }

    //
}
