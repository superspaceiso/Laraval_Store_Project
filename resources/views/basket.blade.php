@extends ('layout')

@section ('title')
<title>{{ $title }}</title>
@endsection

@section ('content')
<div class="row">
  <div class="col-sm">
    <h1>Basket</h1>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Product</th>
          <th>Stock</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Total</th>
        </tr>
      </thead>  
    </table>
  </div>
</div>  
@endsection