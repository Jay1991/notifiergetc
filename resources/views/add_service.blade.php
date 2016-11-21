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
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="pull-left">Add Services</h4>
      </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="{{ url('/store_service') }}">
                {{ csrf_field() }}

                <div class="form-group col-md-12">
                    <label for="name">Service Name</label>
                        <input type="text" class="form-control" name="name">
                </div>

                  <button type="submit" class="btn btn-primary">
                      <i class="fa fa-btn fa-download"></i> Save
                  </button>
                </form>
              </div>
          </div>
        </div>
        <!-- add services end -->

    </div>
</div>
@endsection
