<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Subscription;
use Redirect;
use App\Mail\NotifyCustomer;
use App\Mail\MailQuarter;
use App\Mail\MailLast;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Customer;
use App\Service;
use App\User;
use DB;
use Auth;


class SubscriptionController extends Controller
{

  public function store(Subscription $subscription, Request $request, $id){

    $subscription -> customer = $request -> get('customer');
    $subscription -> service = $request -> get('service');
    $subscription -> start = $request -> get('start');
    $subscription -> end = $request -> get('end');

    $customer = $request -> get('customer');

    $email = Customer::where('name', '=', $customer)->pluck('email');

    $subscription -> email = $email[0];

    $start = $request -> get('start');
    $end = $request -> get('end');

    $startDate = Carbon::parse($start);
    $endDate = Carbon::parse($end);

    $lifetime = $startDate->diffInDays($endDate);

    $half = 0.5*$lifetime;

    $quater = 0.25  * $lifetime;

    // divides into three parts for sending notifications
    $subscription -> lifetime = $lifetime;

    $subscription -> half = $startDate -> addDays($half)->toDateTimeString();

    $subscription -> quarter = $startDate -> addDays($quater)->toDateTimeString();

    $subscription -> last = $endDate -> subDay()->toDateTimeString();

    $subscription -> user_id = $id;

    $subscription -> save();

    return Redirect::to('/home');
    }

    public function sendNotification(){

    $todayDate = Carbon::now()->toDateString();

    $subscriptions = Subscription::where('half', '=', $todayDate)->get(['id']);

    foreach ($subscriptions as $subscription) {

      $toNotify = Subscription::findOrFail($subscription->id);

      Mail::to($toNotify)
            ->send(new NotifyCustomer($toNotify));

    }
    }

    public function notifyQuarter(){

      $todayDate = Carbon::now()->toDateString();

      $subscriptions = Subscription::where('quarter', '=', $todayDate)->get(['id']);

      foreach ($subscriptions as $subscription) {

        $toNotify = Subscription::findOrFail($subscription->id);

        Mail::to($toNotify)
              ->send(new MailQuarter($toNotify));

      }
    }

    public function notifyLast(){

      $todayDate = Carbon::now()->toDateString();

      $subscriptions = Subscription::where('last', '=', $todayDate)->get(['id']);

      foreach ($subscriptions as $subscription) {

        $toNotify = Subscription::findOrFail($subscription->id);

        Mail::to($toNotify)
              ->send(new MailLast($toNotify));

      }
    }

    public function list(){

      $id = Auth::user()->id;

      $customers = Customer::where('user_id', '=', $id)->get();

      $services = Service::where('user_id', '=', $id)->get();

      return view('list_to_notify')->with('customers', $customers)->with('services', $services);
    }

    public function subscriptions(){

      $id = Auth::user()->id;

      $subscriptions = Subscription::where('user_id', '=', $id)->get();

      return view('test')->with('subscriptions', $subscriptions);

    }


}
