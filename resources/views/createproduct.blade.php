@extends ('layout')

@section ('title')
<title>{{ $title }}</title>
@endsection

@section ('content')
<div class="row">
  <div class="col-sm">
    <h1>Create New Product</h1>
  </div>
</div>
<div class="row">
  <div class="col-sm">
    <form method="post" action="/admin/create-product">
      @csrf
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Product Name</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="product_name" autofocus>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Product Brand</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="product_brand">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Product Category</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="product_category">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Product Price</label>
        <div class="col-sm">
          <input type="text" step="any" min="0" class="form-control" name="product_price">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Product Quantity</label>
        <div class="col-sm">
          <input type="number" min="0"class="form-control" name="product_quantity">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Product Description</label>
        <div class="col-sm">
          <textarea class="form-control" rows="10" name="product_description"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Product Image</label>
        <div class="col-sm">
          <input type="file" class="form-control-file">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">On Sale</label>
        <div class="col-sm">
          <select class="custom-select" name="on_sale">
            <option value="1">Yes</option>
            <option value="0">No</option>
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
@endsection
