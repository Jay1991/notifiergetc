@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="row">
          <div class="col-md-3 col-md-offset-1">
            <a href="{{ url('/add_customer') }}" type="button" class="btn btn-success"><h4>Add Customer</h4></a>

          </div>
          <div class="col-md-3 col-md-offset-1">
            <a href="{{ url('/add_service') }}" type="button" class="btn btn-success"><h4>Add Service</h4></a>

          </div>
          <div class="col-md-3">
            <a href="{{ url('/list_to_notify') }}" type="button" class="btn btn-success"><h4>Create List of Customer to Notify</h4></a>

          </div>
        </div>
      </div>

      <div class="col-md-10 col-md-offset-1" style="padding-top: 50px;">
        <form class="form-horizontal" role="form" method="post" action="{{ url('/store_notification/'.Auth::user()->id) }}">
            {{ csrf_field() }}

            <div class="form-group col-md-12">
                <label for="end">Customer Name</label>
                <select class="form-control" id="sel1" name="customer">
                  @foreach($customers as $customer)
                  <option>{{ $customer->name }}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group col-md-12">
                <label for="end">Service</label>
                <select class="form-control" id="sel1" name="service">
                  @foreach($services as $service)
                  <option>{{ $service->name }}</option>
                  @endforeach
                </select>

            </div>

            <div class="form-group col-md-12">
                <label for="end">Start Date</label>
                    <input type="text" id="start" class="form-control" name="start">
            </div>

            <div class="form-group col-md-12">
                <label for="end">End Date</label>
                    <input type="text" id="end" class="form-control" name="end">
            </div>
              <button type="submit" class="btn btn-primary">
                  <i class="fa fa-btn fa-download"></i> Submit
              </button>
            </form>
      </div>
    </div>
</div>
@endsection

@section('datepicker')
<script>
	$(document).ready(function(){
		var date_start=$('#start'); //our date input has the name "date"
    var date_end=$('#end'); //our date input has the name "date"

		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_start.datepicker({
			format: 'yyyy-mm-dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
    date_end.datepicker({
      format: 'yyyy-mm-dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
    })
	})
</script>
@endsection
