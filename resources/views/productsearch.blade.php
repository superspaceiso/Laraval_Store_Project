@extends ('layout')

@section ('title')
<title>{{ $title }}</title>
@endsection

@section ('content')
<div class="row">
  <div class="col-sm">
    <h1>Product Search</h1>
  </div>
</div>
<div class="row">
  <div class="col-sm">
    <form method="post" action="/admin/product-search">
      @csrf
      <div class="form-group row">
        <div class="col-sm-10">
          <input type="text" name="query" class="form-control" placeholder="Enter Product Name or ID" autofocus>
        </div>
        <div class="col-sm-2">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </div>
    </form>
  </div>
</div>
@if(is_null($search))
@else
<div class="row">
  <div class="col-sm">
    <table class="table table-bordered table-hover">
      <thead class="thead">
        <tr>
          <th>ID</th>
          <th></th>
          <th>Product Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>On Sale</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      @foreach($search as $product)
      <tr>
        <td>{{$product->id}}</td>
        <td></td>
        <td>{{$product->name}}</td>
        <td>{{$product->quantity}}</td>
        <td>{{$product->original_price}}</td>
        <td>{{$product->on_sale}}</td>
        <td><a href="product-search/edit/{{$product->id}}" class="btn btn-primary" role="button">Edit</a></td>
        <td><a href="product-search/delete/{{$product->id}}" class="btn btn-danger" role="button">Delete</a></td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endif
@include('partials.form_error')
@endsection
