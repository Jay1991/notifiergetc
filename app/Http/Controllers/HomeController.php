<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Subscription;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;

        $subscriptions = Subscription::where('user_id', '=', $id)->get();

        return view('test')->with('subscriptions', $subscriptions);

    }
}
