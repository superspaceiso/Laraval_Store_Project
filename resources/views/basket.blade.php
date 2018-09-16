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
          <th></th>
          <th></th>
        </tr>
      </thead>
      @if(is_null($basket_items))
        <tr>
        </tr>
      @else
        @foreach($basket_items as $basket_item)
        <tr>
          <td></td>
          <td>{{$basket_item['product_id']}}</td>
          <td>{{$basket_item['quantity']}}</td>
          <td><a href="/update/{{$basket_item['product_id']}}" class="btn btn-primary" role="button">Update Quantity</a></td>
          <td><a href="/delete/{{$basket_item['product_id']}}" class="btn btn-danger" role="button">Delete</a></td>
        </tr>
        @endforeach
      @endif
    </table>
    <a href="/delete" class="btn btn-danger" role="button">Delete All</a>
  </div>
</div>
@endsection
