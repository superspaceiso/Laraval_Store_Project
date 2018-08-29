<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ProductController extends Controller
{
    public function Page()
    {
      return view('createproduct')->with('title', 'Create New Product');
    }

    public function Store()
    {
      $new_product = Products::CreateProduct(request('product_name'), request('product_brand'), request('product_category'), request('product_price'), request('product_quantity'), request('product_quantity'), request('on_sale'));
      return view('createproduct')->with('title', 'Create New Product');
    }

}
