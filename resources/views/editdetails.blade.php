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
    <form method="post" action="/account/edit-details">
      @csrf
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">First Name*</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="firstname" value="{{$account_info[0]->firstname}}">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Middle Name</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="middlename" value="{{$account_info[0]->middlename}}">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Surname*</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="surname" value="{{$account_info[0]->surname}}">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email Address*</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="email" value="{{$account_info[0]->email}}">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Mobile Number*</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="mobile_number" value="{{$account_info[0]->mobile_number}}">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Phone Number</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="phone_number" value="{{$account_info[0]->phone_number}}">
        </div>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-sm">
    <h2>Address</h2>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Address Line 1*</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="address_line_1" value="{{$account_info[0]->address_line1}}">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Address Line 2</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="address_line_2" value="{{$account_info[0]->address_line2}}">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Address Line 3</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="address_line_3" value="{{$account_info[0]->address_line3}}">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Town*</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="town" value="{{$account_info[0]->town}}">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Postcode*</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="postcode" value="{{$account_info[0]->postcode}}">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">County</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="county" value="{{$account_info[0]->county}}">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Country*</label>
        <div class="col-sm">
          <select class="custom-select" name="country">
            @foreach($countries->decode() as $country)
              @if($country == 'United Kingdom')
                <option selected>{{$account_info[0]->country}}</option>
              @else
                <option>{{$country}}</option>
              @endif
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group row">
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-danger" href="/account" role="button">Cancel</a>
      </div>
    </form>
  </div>
</div>
@include('partials.form_error')
@include('partials.form_success')
@endsection
