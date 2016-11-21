<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Customer;

use Redirect;

use Auth;

class CustomerController extends Controller
{
    public function create(){
      return view('add_customer');
    }

    public function store(Customer $customer, Request $request){

      $id = Auth::user()->id;

      $customer -> name = $request -> get('name');

      $customer -> email = $request -> get('email');

      $customer -> user_id = $id;

      $customer -> save();

      return Redirect::to('/home');

    }

    public function show(){

      $id = Auth::user()->id;

      $customers = Customer::where("user_id", "=", $id)->get();

      return view('customers')->with('customers', $customers);

    }

}
