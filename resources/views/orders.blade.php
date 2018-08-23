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
@foreach($orders as $order)
<div class="row">
  <div class="col-sm">
    <h3>Order Number: {{$order['order_id']}}</h3>
  </div>
  <div class="col-sm">
    <h3>Order Date: {{$order['order_date']}}</h3>
  </div>
</div>
<div class="row">
  <div class="col-sm">
    <h4>Order Items:</h4>
    @foreach($order['items'] as $order_items)
    {{$order_items['product_name']}} Quantity: {{$order_items['quantity']}} <br>
    @endforeach
  </div>
  <div class="col-sm">
    <h4>Delivery Information:</h4>
    {{$order['firstname']}} {{$order['middlename']}} {{$order['surname']}}<br><br>
    {{$order['address_line1']}}<br>
    @if(!$order['address_line2'] == NULL) {{$order['address_line2']}}<br> @endif
    @if(!$order['address_line3'] == NULL) {{$order['address_line3']}}<br> @endif
    {{$order['town']}}<br>
    {{$order['postcode']}}<br>
    @if(!$order['county'] == NULL) {{$order['county']}}<br> @endif
    {{$order['country']}}<br><br>
    @if(!$order['mobile_number'] == NULL) Mobile Number: {{$order['mobile_number']}}<br> @endif
    @if(!$order['phone_number'] == NULL) Phone Number: {{$order['phone_number']}} @endif
  </div>
</div>
<div class="row">
  <div class="col-sm">
    <hr>
    <button type="submit" class="btn btn-primary">Shipped</button>
    <button type="submit" class="btn btn-primary">Invoice</button>
    <hr>
  </div>
</div>
@endforeach
@endsection
