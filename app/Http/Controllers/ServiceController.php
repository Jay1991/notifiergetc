<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Service;

use Redirect;

use Auth;

class ServiceController extends Controller
{
    public function create(){
      return view('add_service');
    }

    public function store(Service $service, Request $request){

      $id = Auth::user()->id;

      $service -> name = $request -> get('name');
      $service -> user_id = $id;

      $service -> save();

      return Redirect::to('/home');

    }

    public function show(){

      $id = Auth::user()->id;

      $services = Service::where("user_id", "=", $id)->get();

      return view('services')->with('services', $services);

    }
}
