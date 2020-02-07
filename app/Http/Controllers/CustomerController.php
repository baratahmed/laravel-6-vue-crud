<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function index(){
        return view('customer');
    }

    public function save(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return "Submitted Successfully!!";

    }

    public function customerList(){
        $data  = Customer::all();
        return $data;
    }

    public function edit($id){
        $data = Customer::find($id);
        return view('edit', compact('data'));
    }

    public function update(Request $request, $id){
        Customer::find($id)->update($request->all());
        return 'Update Done';
    }

    public function delete($id){
        Customer::find($id)->delete();
        return 'Deleted';
    }
}
