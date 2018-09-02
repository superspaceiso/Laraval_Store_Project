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
    <form method="post" action="/admin/create-staff">
      @csrf
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">First Name</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="staff_firstname">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Middle Name</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="staff_middlename">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Surname</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="staff_surname">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email Address</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="staff_email">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Privilage Level</label>
        <div class="col-sm">
          <select class="custom-select" name="access_level">
            <option value="1">Admin</option>
            <option value="2">Manager</option>
            <option value="3">Staff</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-danger" href="/admin" role="button">Cancel</a>
      </div>
    </form>
  </div>
</div>
@include('partials.form_error')
@include('partials.form_success')
@endsection
