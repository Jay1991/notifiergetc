@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-1">
        <div class="row">
          <div class="col-md-3 col-md-offset-1 col-sm-10 col-sm-offset-1">
            <a href="{{ url('/add_customer') }}" type="button" class="btn btn-success"><h4>Add Customer</h4></a>

          </div>
          <div class="col-md-3 col-md-offset-1 col-sm-10 col-sm-offset-1">
            <a href="{{ url('/add_service') }}" type="button" class="btn btn-success"><h4>Add Service</h4></a>

          </div>
          <div class="col-md-3 col-sm-10">
            <a href="{{ url('/list_to_notify') }}" type="button" class="btn btn-success"><h4>Create List of Customer to Notify</h4></a>

          </div>
        </div>

      </div>
      <div class="col-md-10 col-md-offset-1">
          <h2>List of customers to notify</h2>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Customer</th>
                <th>Service</th>
                <th>Start Date</th>
                <th>End Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach($subscriptions as $subscription)
              <tr>
                <td>{{ $subscription->customer }}</td>
                <td>{{ $subscription->service }}</td>
                <td>{{ $subscription->start }}</td>
                <td>{{ $subscription->end }}</td>
                <?php

                // use Carbon\Carbon;
                // $time = array('years' => $years, 'months' => $months, 'weeks' => $years, 'days' => $days);

                // if($subscription->lifetime >= 365){

                // }

                // $time = \Carbon\CarbonInterval::year($subscription->lifetime);

                 ?>

                <!-- <td>{{ $subscription->lifetime }} days</td> -->

              </tr>
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
</div>
@endsection
