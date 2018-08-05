@extends ('layout')

@section ('title')
<title>{{ $title }}</title>
@endsection

@section ('content')
<div class="row">
  <div class="col-sm">
    <h1>Edit Details</h1>
  </div>
</div>
<div class="row">
  <div class="col-sm">
    <h2>Name and Contact</h2>
    <form>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">First Name</label>
        <div class="col-sm">
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Middle Name</label>
        <div class="col-sm">
          <input type="text" class="form-control">
        </div>  
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Surname</label>
        <div class="col-sm">
          <input type="text" class="form-control">
        </div>  
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email Address</label>
        <div class="col-sm">
          <input type="text" class="form-control">
        </div>  
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Telephone Number</label>
        <div class="col-sm">
          <input type="text" class="form-control">
        </div>  
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Mobile Number</label>
        <div class="col-sm">
          <input type="text" class="form-control">
        </div>  
      </div>
    </form>
  </div>
</div>  
<div class="row">
  <div class="col-sm">
    <h2>Address</h2>
    <form>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Address Line 1</label>
        <div class="col-sm">
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Address Line 2</label>
        <div class="col-sm">
          <input type="text" class="form-control">
        </div>  
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Address Line 3</label>
        <div class="col-sm">
          <input type="text" class="form-control">
        </div>  
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Town</label>
        <div class="col-sm">
          <input type="text" class="form-control">
        </div>  
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Postcode</label>
        <div class="col-sm">
          <input type="text" class="form-control">
        </div>  
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">County</label>
        <div class="col-sm">
          <input type="text" class="form-control">
        </div>  
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Country</label>
        <div class="col-sm">
          <input type="text" class="form-control">
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