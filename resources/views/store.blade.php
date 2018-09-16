@extends ('layout')

@section ('title')
<title>{{$title}}</title>
@endsection

@section ('content')
<div class="row">
  <div class="col-sm">
    <h1>Store</h1>
  </div>
</div>
<div class="row">
  <div class="col-sm">
    <table class="table">
      @foreach($products as $product)
      <tr>
        <td><a href="/store/product/{{$product->id}}/"><img src="http://via.placeholder.com/100x100"></a></td>
        <td><a href="/store/product/{{$product->id}}/">{{$product->name}}</a></td>
        <td>{{$product->quantity > 0 ? "In Stock" : "Out of Stock"}}</td>
        <td>&pound;{{round($product->original_price,2)}}</td>
        <td><a href="/add/{{$product->id}}" class="btn btn-primary" role="button">Add To Basket</a></td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@include('partials.basket_success')
@endsection
