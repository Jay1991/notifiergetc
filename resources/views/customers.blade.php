@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        @foreach($customers as $customer)
        <h4>{{ $customer->name }}</h4>
        @endforeach
      </div>
    </div>
</div>
@endsection
