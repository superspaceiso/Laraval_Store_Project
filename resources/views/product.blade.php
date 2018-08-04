@extends ('layout')

@section ('title')
<title>{{ $product->name }}</title>
@endsection

@section ('content')
<div class="row">
  <div class="col-sm">
    <h1>{{$product->name}}</h1>
  </div>
  <div class="col-sm">  
    <h2>&pound;{{round($product->original_price,2)}}</h2>
    <h2>{{$product->quantity > 0 ? "In Stock" : "Out of Stock"}}</h2>
  </div>
</div>
<div class="row">
  <div class="col-sm">
    <p>{{$product->description}}</p>
  </div>
</div>  
@endsection