@extends ('layout')

@section ('title')
<title>{{ $title }}</title>
@endsection

@section ('content')
<div class="row">
  <div class="col-sm">
    <h1>Admin</h1> 
  </div>  
</div>
<div class="row">
  <div class="col-sm">
    <h2>Customer</h2>
    <ul>
      <li><a href="admin/account-search/">Look Up Account</a></li>
      <li><a href="admin/order-search/">Look Up Order</a></li>
    <ul>   
  </div>  
</div>
<div class="row">
  <div class="col-sm">
    <hr>
    <h2>Orders</h2>
    <ul>
      <li><a href="admin/outstanding-orders/">Outstanding Orders</a> <span class="badge badge-pill badge-danger">80</span></li>
      <li>Processed Orders</li>
    <ul>
  </div>  
</div> 
<div class="row">
  <div class="col-sm">
    <hr>
    <h2>Products</h2>
    <ul>
      <li><a href="admin/create-product/">Create New Product</a></li>
      <li><a href="admin/product-search/">Product Search</a></li>
    <ul>
  </div>  
</div> 
<div class="row">
  <div class="col-sm">
    <hr>
    <h2>Staff</h2>
    <ul>
      <li><a href="admin/create-staff/">Create Staff Member</a></li>
      <li><a href="admin/staff-search/">Staff Search</a></li>
    <ul>   
  </div>  
</div>
           
@endsection