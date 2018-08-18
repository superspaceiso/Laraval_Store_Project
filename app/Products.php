<?php

namespace App;

use Illuminate\Support\Facades\DB;

class Products
{
    public static function ListProducts()
    {
      return DB::table('products')->where('on_sale','=',1)->where('quantity','>=',0)->get();
    }

    public static function GetBrand($brand)
    {
      return DB::table('products')->join('brand_map', 'products.id', '=', 'brand_map.product_id')->join('product_brands', 'product_brands.id','=','brand_map.brand_id')->select('product_brands.name as brand_name','products.*')->where('product_brands.name','=',$brand)->get();
    }

    public static function GetCategory($category)
    {
      return DB::table('products')->join('category_map', 'products.id', '=', 'category_map.product_id')->join('product_categories', 'product_categories.id','=','category_map.category_id')->select('product_categories.name as category_name','products.*')->where('product_categories.name','=',$category)->get();
    }

    public static function GetProduct($id)
    {
      return DB::table('products')->join('brand_map', 'products.id', '=', 'brand_map.product_id')->join('product_brands', 'product_brands.id','=','brand_map.brand_id')->select('product_brands.name as brand_name','products.*')->where('products.id','=',$id)->get();
    }
}
