<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use Validator;

class ProductController extends Controller
{
    public function CreatePage()
    {
        return view('createproduct')->with('title', 'Create New Product');
    }

    public function CreateProduct()
    {
        $validation_rules = [
        'product_name' => 'required',
        'product_brand' => 'required',
        'product_category' => 'required',
        'product_price' => 'required|numeric',
        'product_quantity' => 'required|numeric',
        'product_description' => 'required',
        'on_sale' => 'required|numeric'
      ];

        $validate = Validator::make(request()->all(), $validation_rules);

        if ($validate->fails()) {
            return redirect('admin/create-product')->withErrors($validate);
        } else {
            $new_product = Products::CreateProduct(request('product_name'), request('product_brand'), request('product_category'), request('product_price'), request('product_quantity'), request('product_description'), request('on_sale'));

            return view('createproduct')->with('title', 'Create New Product');
        }
    }
}
