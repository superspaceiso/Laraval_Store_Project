@extends ('layout')

@section ('title')
<title>{{ $title }}</title>
@endsection

@section ('content')
<div class="row">
  <div class="col-sm">
    <h1>Edit Staff Member</h1>
  </div>
</div>
<div class="row">
  <div class="col-sm">
    <form method="post" action="/admin/staff-search">
      @csrf
      <div class="form-group row">
        <div class="col-sm-10">
          <input type="text" class="form-control" name="query" autofocus value="{{ old('query') }}">
        </div>
        <div class="col-sm-2">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </div>
    </form>
  </div>
</div>
@if(is_null($search))
@else
<div class="row">
  <div class="col-sm">
    <table class="table table-bordered table-hover">
      <thead class="thead">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email Address</th>
          <th>Privilage Level</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      @foreach($search as $staff)
      <tr>
        <td>{{$staff->id}}</td>
        <td>{{$staff->firstname}} @if($staff->middlename) {{$staff->middlename}} @endif {{$staff->surname}}</td>
        <td>{{$staff->email}}</td>
        <td>{{$staff->access_level}}</td>
        <td><a href="staff-search/edit/{{$staff->id}}" class="btn btn-primary" role="button">Edit</a></td>
        <td><a href="staff-search/delete/{{$staff->id}}" class="btn btn-danger" role="button">Delete</a></td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endif
@include('partials.form_error')
@endsection
