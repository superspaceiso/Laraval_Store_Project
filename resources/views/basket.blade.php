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
          <th>Description</th>
          <th>Quantity</th>
          <th>Stock</th>
          <th>Price</th>
          <th>Total</th>
        </tr>
      </thead>
      @if(is_null($basket_items))
      <tr>
        <td><h2>Basket is Empty</h2></td>
      </tr>
      @else
        @foreach($basket_items as $basket_item)
        <tr>
          <td>{{$basket_item->product_id}}</td>
          <td></td>
          <td>
            <input>
            <a href="/update/{{$basket_item['product_id']}}" class="btn btn-primary" role="button">Update Quantity</a>
            <a href="/delete/{{$basket_item['product_id']}}" class="btn btn-danger" role="button">Delete</a>
          </td>
          <td></td>
          <th></td>
        </tr>
        <tr>
          <td>Total: £</td>
        </tr>
        @endforeach
      @endif
    </table>

  </div>
</div>
<div class="row">
  <div class="col-sm">
  </div>
  <div class="float-sm-left">
    <a href="basket/delete" class="btn btn-danger" role="button">Empty Basket</a>
  </div>
</div>
@endsection
