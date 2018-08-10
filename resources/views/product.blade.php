@extends ('layout')

@section ('title')
<title>{{$product[0]->brand_name}} {{ $product[0]->name }}</title>
@endsection

@section ('content')
<div class="row">
  <div class="col-sm">
    <h1>{{$product[0]->brand_name}} {{$product[0]->name}}</h1>  
  </div>
</div>
<div class="row">
  <div class="col-sm">
    <a href="https://placeholder.com"><img src="http://via.placeholder.com/300x300"></a>
  </div>  
  <div class="col-sm">  
    <h2>&pound;{{round($product[0]->original_price,2)}}</h2>
    <h3>{{$product[0]->quantity > 0 ? "In Stock" : "Out of Stock"}}</h3>
    <a href="{{$product[0]->id}}" class="btn btn-primary" role="button">Add To Basket</a>
  </div>
</div>
<div class="row">
  <div class="col-sm">
    <hr>
    <h2>Product Overview</h2>
    <p>{{$product[0]->description}}</p>
  </div>
</div>  
@endsection