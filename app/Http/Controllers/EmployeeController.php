<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function form_view(){
        return view('crud.create');
    }

    public function insert(Request $request){
        $request->validate([
            'employee_id'=>'Required',
            'name'=>'Required',
            'email'=>'Required',
            'phone'=>'Required',
            'address'=>'Required',
            'salary'=>'Required',        

        ]);
        $data_insert =new employee();
        $data_insert->employee_id=$request->employee_id;
        $data_insert->name=$request->name;
        $data_insert->email=$request->email;
        $data_insert->phone=$request->phone;
        $data_insert->address=$request->address;
        $data_insert->salary=$request->salary;

        $data_insert->save();
        return redirect()->route('form');

    }
    public function display(){
        $data=employee::all();
        return view('crud.read', compact('data'));
        }
    public function edit($id){
        $data=employee::find($id);
        return view('crud.update', compact('data'));
    }
    public function update(Request $request, $id){
        $data_update =employee::find($id);
        $request->validate([

            'employee_id'=>'Required',
            'name'=>'Required',
            'email'=>'Required',
            'phone'=>'Required',
            'address'=>'Required',
            'salary'=>'Required',
            
        ]);
        $data_update->employee_id=$request->employee_id;
        $data_update->name=$request->name;
        $data_update->email=$request->email;
        $data_update->phone=$request->phone;
        $data_update->address=$request->address;
        $data_update->salary=$request->salary;

        $data_update->save();
        return redirect()->route('display');

    }
    public function delete($id){
        $data=employee::destroy($id);
        return redirect()->route('display');
    }




}
