@extends ('layout')

@section ('title')
<title>{{ $title }}</title>
@endsection

@section ('content')
<div class="row">
  <div class="col-sm">
    <h1>Edit Staff Details</h1>
  </div>
</div>
<div class="row">
  <div class="col-sm">
    <h2>Name and Contact</h2>
    <form method="post" action="/admin/staff-search/">
      @csrf
      @foreach($search as $staff)
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">First Name*</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="firstname" value="{{$staff->firstname}}">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Middle Name</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="middlename" value="{{$staff->middlename}}">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Surname*</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="surname" value="{{$staff->surname}}">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email Address*</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="email" value="{{$staff->email}}">
        </div>
      </div>
      @endforeach
      <div class="form-group row">
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-danger" href="/admin/staff-search" role="button">Cancel</a>
      </div>
    </form>
</div>

@include('partials.form_error')
@include('partials.form_success')
@endsection
