<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class StoreController extends Controller
{

    public function Catalogue()
    {
      $products = Products::all();

      $title = 'Store';

      return view('store',compact('products','title'));
    }

    public function BrandCatalogue($brand)
    {
      $products = Products::GetBrand($brand);

      $title = 'Store';

      return view('store',compact('products','title'));
    }

    public function CategoryCatalogue($category)
    {
      $products = Products::GetCategory($category);

      $title = 'Store';

      return view('store',compact('products','title'));
    }

    public function Product($id)
    {
      $product = Products::GetProduct($id);

      return view('product',compact('product'));
    }

}
