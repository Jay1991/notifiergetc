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
      <div class="col-md-10 col-md-offset-1">

      </div>

    </div>
</div>
@endsection
