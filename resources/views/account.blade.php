@extends ('layout')

@section ('title')
<title>{{ $title }}</title>
@endsection

@section ('content')
<div class="row">
  <div class="col-sm">
    <h1>My Account</h1>
  </div>
</div>
<div class="row">
  <div class="col-sm">
    <h2>Personal Details</h2>
    <ul>
      <li>Account Number: <strong>{{$account_info[0]->id}}</strong></li>
      <li>Name: <strong>{{$account_info[0]->firstname}}  @if(!$account_info[0]->middlename == NULL) {{$account_info[0]->middlename}} @endif {{$account_info[0]->surname}}</strong></li>
      <li>Email: <strong>{{$account_info[0]->email}}</strong></li>
      <li>Mobile Number: <strong></strong></li>
      <li>Phone Number: <strong></strong></li>
      <li>Address: <strong>{{$account_info[0]->address_line1}},@if(!$account_info[0]->address_line2 == NULL) {{$account_info[0]->address_line2}}, @endif @if(!$account_info[0]->address_line3 == NULL) {{$account_info[0]->address_line3}}, @endif {{$account_info[0]->town}}, {{$account_info[0]->postcode}}, {{$account_info[0]->country}}</strong></li>
    </ul>
  </div>
  <div class="col-sm">
    <h2>Change Details</h2>
    <div class="col-sm">
      <a href="account/editdetails" class="btn btn-primary" role="button">Edit Details</a>
    </div>
    <div class="col-sm">
      <a href="account/changepassword" class="btn btn-primary" role="button">Change Password</a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm">
    <h2>Order History</h2>
    <table class="table">
      <thead class="thead">
        <tr>
          <th>Order Date</th>
          <th>Order No</th>
          <th>Total</th>
          <th>Status</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
@endsection
