@extends ('layout')

@section ('title')
<title>{{ $title }}</title>
@endsection

@section ('content')
<div class="row">
  <div class="col-sm">
    <h1>Basket</h1>
    <table class="table">
      <thead class="thead">
        <tr>
          <th></th>
          <th>Product</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Sub Total</th>
        </tr>
      </thead>  
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><strong>£</strong></td>
        <td><strong>£</strong></td>
      </tr>  
    </table>
  </div>
</div>  
@endsection