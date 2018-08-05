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
      <li><a href="admin/accountsearch/">Look Up Account</a></li>
      <li><a href="admin/ordersearch/">Look Up Order</a></li>
    <ul>   
  </div>  
</div>
<div class="row">
  <div class="col-sm">
    <hr>
    <h2>Staff</h2>
    <ul>
      <li><a href="admin/createstaff/">Create Staff Member</a></li>
      <li><a href="admin/editstaff/">Edit Staff Member</a></li>
    <ul>   
  </div>  
</div>
<div class="row">
  <div class="col-sm">
    <hr>
    <h2>Products</h2>
    <ul>
      <li><a href="admin/createproduct/">Create New Product</a></li>
      <li><a href="admin/editproduct/">Edit Product</a></li>
    <ul>
  </div>  
</div>            
@endsection