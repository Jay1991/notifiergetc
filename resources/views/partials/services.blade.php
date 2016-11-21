@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <select class="selectpicker" data-live-search="true">
          <!-- search form to be here -->


          @foreach($services as $service)
          <option>{{ $service->name }}</option>
          @endforeach
        </select>
        @foreach($services as $service)
        <h4>{{ $service->name }}</h4>
        @endforeach
      </div>
    </div>
</div>
@endsection
