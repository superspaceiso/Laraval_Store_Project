@extends ('layout')

@section ('title')
<title>{{ $title }}</title>
@endsection

@section ('content')
<div class="row">
  <div class="col-sm">
    <h1>Create New Staff Member</h1> 
  </div>  
</div> 
<div class="row">
  <div class="col-sm">
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
        <label class="col-sm-2 col-form-label">Privilage Level</label>
        <div class="col-sm">
          <select>
            <option value="1">Admin</option>
            <option value="2">Manager</option>
            <option value="3">Staff</option>
          </select>
        </div>  
      </div>
    </form>
  </div>
</div>         
@endsection