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
    <form method="post" action="/updatedetails">
      @csrf
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
        <label class="col-sm-2 col-form-label">Mobile Number</label>
        <div class="col-sm">
          <input type="text" class="form-control">
        </div>  
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Phone Number</label>
        <div class="col-sm">
          <input type="text" class="form-control">
        </div>  
      </div>
    </form>
  </div>
</div>  
<div class="row">
  <div class="col-sm">
    <h2>Address</h2>
    <form>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Address Line 1</label>
        <div class="col-sm">
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Address Line 2</label>
        <div class="col-sm">
          <input type="text" class="form-control">
        </div>  
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Address Line 3</label>
        <div class="col-sm">
          <input type="text" class="form-control">
        </div>  
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Town</label>
        <div class="col-sm">
          <input type="text" class="form-control">
        </div>  
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Postcode</label>
        <div class="col-sm">
          <input type="text" class="form-control">
        </div>  
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">County</label>
        <div class="col-sm">
          <input type="text" class="form-control">
        </div>  
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Country</label>
        <div class="col-sm">
          <select class="custom-select">
            @foreach($countries->decode() as $country)
              @if($country == 'United Kingdom')
                <option selected>{{$country}}</option>
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
@endsection