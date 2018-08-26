<?php

namespace App;

use Illuminate\Support\Facades\DB;

class Products
{
    public static function Product()
    {
      return DB::table('products');
    }

    public static function ProductBrand()
    {
      return DB::table('product_brands');
    }

    public static function ProductCategory()
    {
      return DB::table('product_categories');
    }

    public static function CategoryJunction()
    {
      return DB::table('category_map');
    }

    public static function BrandJunction()
    {
      return DB::table('brand_map');
    }

    public static function ListProducts()
    {
      return self::Product()->where('on_sale','=',1)->where('quantity','>=',0)->get();
    }

    public static function GetBrand($brand)
    {
      return self::Product()->join('brand_map', 'products.id', '=', 'brand_map.product_id')->join('product_brands', 'product_brands.id','=','brand_map.brand_id')->select('product_brands.name as brand_name','products.*')->where('product_brands.name','=',$brand)->get();
    }

    public static function GetCategory($category)
    {
      return self::Product()->join('category_map', 'products.id', '=', 'category_map.product_id')->join('product_categories', 'product_categories.id','=','category_map.category_id')->select('product_categories.name as category_name','products.*')->where('product_categories.name','=',$category)->get();
    }

    public static function GetProduct($id)
    {
      return self::Product()->join('brand_map', 'products.id', '=', 'brand_map.product_id')->join('product_brands', 'product_brands.id','=','brand_map.brand_id')->select('product_brands.name as brand_name','products.*')->where('products.id','=',$id)->get();
    }

    public static function SearchProduct($query)
    {
      return self::Product()->where('id','=',$query)->orWhere('name','like','%'.$query.'%')->get();
    }

    public static function CreateProduct($product_name,$product_brand,$product_category,$product_price,$product_quantity,$product_description,$product_onsale)
    {
      $product_id = self::Product()->insertGetId(['name' => $product_name, 'description' => $product_description, 'quantity' => $product_quantity, 'on_sale' => $product_onsale, 'original_price' => $product_price]);
      $brand_id = self::ProductBrand()->insertGetId(['name' => $product_brand]);
      $category_id = self::ProductCategory()->insertGetId(['name' => $product_category]);
      self::BrandJunction()->insert(['brand_id' => $brand_id, 'product_id' => $product_id]);
      self::CategoryJunction()->insert(['category_id' => $category_id, 'product_id' => $product_id]);
    }

    public static function UpdateProduct($product_id,$product_name,$product_brand,$product_category,$product_price,$product_quantity,$product_description,$product_onsale)
    {
      self::Product()->where('id',$product_id)->update(['name' => $product_name, 'description' => $product_description, 'quantity' => $product_quantity, 'on_sale' => $product_onsale, 'new_price' => $product_price]);
    }

    public static function DeleteProduct($product_id)
    {
      self::Product()->where('id', $product_id)->delete();
      self::BrandJunction()->where('product_id', $product_id)->delete();
      self::CategoryJunction()->where('product_id', $product_id)->delete();
    }

}
