@extends ('layout')

@section ('title')
<title>{{ $title }}</title>
@endsection

@section ('content')
<div class="row">
  <div class="col-sm">
    <h1>Edit Product</h1> 
  </div>  
</div>   
<div class="row">
  <div class="col-sm">
    <form>
      <div class="form-group row">
        <div class="col-sm-10">
          <input type="text" class="form-control">
        </div>
        <div class="col-sm-2">
          <a href="" class="btn btn-primary" role="button">Search</a>
        </div>
      </div>
  </div>  
</div>
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
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><a href="" class="btn btn-primary" role="button">Edit</a></td>
        <td><a href="" class="btn btn-danger" role="button">Delete</a></td>
      </tr> 
    </table>
  </div>  
</div>        
@endsection