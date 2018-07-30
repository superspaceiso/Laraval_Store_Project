@extends ('layout')

@section ('title')
<title>Checkout</title>
@endsection

@section ('content')
<div class="row">
  <div class="col-sm">
    <h1>Checkout</h1>
  </div>
</div>
<div class="row">
  <div class="col-sm">
    <h2>Your Details</h2>
    <form>
      <input placeholder="First Name"></input>
      <input placeholder="Surname"></input>
      <input placeholder="Email Address"></input>
      <input placeholder="Home Telephone"></input>
      <input placeholder="Mobile Telephone"></input>
    </form>
  </div>
  <div class="col-sm">
    <h2>Delivery Details</h2>
    <form>
      <input placeholder="Address Line 1"></input>
      <input placeholder="Address Line 2"></input>
      <input placeholder="Address Line 3"></input>
      <input placeholder="Postcode"></input>
      <input placeholder="Town/City"></input>
    </form>
  </div>
</div>  
<div class="row">
  <div class="col-sm">
    <h2>Your Order</h2>
    <table class="table">
      <thead class="thead">
        <tr>
          <th>Product</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Total</th>
        </tr>
      </thead>  
    </table>  
  </div>
</div>
@endsection