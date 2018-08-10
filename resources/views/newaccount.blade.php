@extends ('layout')

@section ('title')
<title>{{ $title }}</title>
@endsection

@section ('content')
<div class="row">
  <div class="col-sm">
    <h1>Create New Account</h1> 
  </div>  
</div>
<div class="row">
  <div class="col-sm">
    <form method="post">
      @csrf
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email Address</label>
          <div class="col-sm">
            <input type="text" class="form-control" autofocus>
          </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm">
            <input type="password" class="form-control">
          </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Confirm Password</label>
          <div class="col-sm">
            <input type="password" class="form-control">
          </div>
      </div>
      <div class="form-group row">
        <button type="submit" class="btn btn-primary">Create Account</button>
        <a class="btn btn-danger" href="/" role="button">Cancel</a>   
      </div>
    </form>
  </div>
</div>                
@endsection