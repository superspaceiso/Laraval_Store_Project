<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;


class BasketController extends Controller
{
  public function Basket()
  {
    $basket_items = Session::get('basket');

    print_r($basket_items);

    $title = 'Basket';

    return view('basket', compact('title','basket_items'));
  }

  public function AddToBasket($id, $quantity)
  {
    $items = [
      'product_id' => $id,
      'quantity' => $quantity,
    ];

    //Session::push('basket.product_id',$id);

    return back()->with('basket_success', 'Added to Basket');
  }

  public function UpdateBasket($id, $quantity)
  {

  }

  public function DeleteFromBasket($id)
  {
    Session::pull('basket.'.$id);
    return back();
  }

  public function DeleteBasket()
  {
    Session::forget('basket');
    return back();
  }



}
