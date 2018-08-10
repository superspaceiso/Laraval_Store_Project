@extends ('layout')

@section ('title')
<title>{{ $title }}</title>
@endsection

@section ('content')
<div class="row">
  <div class="col-sm">
    <h1>Change Password</h1>
  </div>
</div>
<div class="row">
  <div class="col-sm">
    <form method="post">
      @csrf
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Current Password</label>
          <div class="col-sm">
            <input type="password" class="form-control">
          </div>
      </div>
      <hr>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">New Password</label>
          <div class="col-sm">
            <input type="password" class="form-control">
          </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Repeat New Password</label>
          <div class="col-sm">
            <input type="password" class="form-control">
          </div>
      </div>
      <div class="form-group row">
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-danger" href="/account" role="button">Cancel</a>   
      </div>
    </form>
  </div>
</div>       
@endsection