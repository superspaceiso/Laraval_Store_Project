@extends ('layout')

@section ('title')
<title>{{ $title }}</title>
@endsection

@section ('content')
<div class="row">
  <div class="col-sm">
    <h1>Log In</h1>
    <a href="/new-account">If you don't already have an account, please click here to create one</a>
  </div>
</div>
<div class="row">
  <div class="col-sm">
    <form method="post" action="/login">
      @csrf
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email Address</label>
          <div class="col-sm">
            <input type="text" class="form-control" name="email" autofocus>
          </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm">
            <input type="password" class="form-control" name="password">
          </div>
      </div>
      <div class="form-group row">
        <button type="submit" class="btn btn-primary">Log In</button>
        <a class="btn btn-danger" href="/" role="button">Cancel</a>
      </div>
    </form>
  </div>
</div>
@include('partials.form_error')
@endsection
