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
    <form>
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
    </form>
  </div>
</div>  
<div class="row">
  <div class="col-sm">
    <a href="account/editdetails" class="btn btn-primary" role="button">Update</a>
    <a href="/account" class="btn btn-primary" role="button">Cancel</a>
  </div>
</div>       
@endsection