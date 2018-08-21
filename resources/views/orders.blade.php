@extends ('layout')

@section ('title')
<title>{{ $title }}</title>
@endsection

@section ('content')
<div class="row">
  <div class="col-sm">
    <h1>Outstanding Orders</h1>
  </div>
</div>
<div class="row">
  <div class="col-sm">
    <h3>Order Number:</h3>
  </div>
  <div class="col-sm">
    <h3>Order Date:</h3>
  </div>
</div>
<div class="row">
  <div class="col-sm">
    <h4>Order Items:</h4>
    <ul>
      <li></li>
    </ul>
  </div>
  <div class="col-sm">
    <h4>Delivery Information:</h4>
    <ul>
      <li></li>
    </ul>
  </div>
</div>
<div class="row">
  <div class="col-sm">
    <hr>
    <button type="submit" class="btn btn-primary">Complete</button>
  </div>
</div>
@endsection
