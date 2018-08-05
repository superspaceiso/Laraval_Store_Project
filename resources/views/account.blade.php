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
      <li>Account Number:</li>
      <li>Name:</li>
      <li>Email:</li>
      <li>Mobile Number:</li>
      <li>Phone Number:</li>
      <li>Address:</li>  
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