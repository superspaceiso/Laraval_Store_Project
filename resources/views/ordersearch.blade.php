@extends ('layout')

@section ('title')
<title>{{ $title }}</title>
@endsection

@section ('content')
<div class="row">
  <div class="col-sm">
    <h1>Look Up Order</h1> 
  </div>  
</div>
<div class="row">
  <div class="col-sm">
    <form>
      <div class="form-group row">
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="Customer Order ID" autofocus>
        </div>
        <div class="col-sm-2">
          <a href="" class="btn btn-primary" role="button">Search</a>
        </div>
      </div>
  </div>  
</div>        
@endsection