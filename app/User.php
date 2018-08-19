<?php

namespace App;

use Illuminate\Support\Facades\DB;

class User
{
    public static function AccountInfo($id)
    {
      return DB::table('customer')->join('customer_address', 'customer.id', '=', 'customer_address.customer_id')->join('customer_addresses', 'customer_addresses.id','=','customer_address.address_id')->select('customer.id','customer.firstname','customer.middlename','customer.surname','customer.email','customer.mobile_number','customer.phone_number','customer_addresses.*')->where('customer.id','=',$id)->get();
    }

    public static function Orders($id)
    {
      return DB::table('customer_orders')->select('customer_orders.*')->where('customer_orders.customer_id','=',$id)->get();
    }

    public static function OrderItems($id)
    {
      return DB::table('customer_orders')->join('order_items','customer_orders.id','=','order_id')->select('order_items.*','order_items.order_total as sub_total')->where('customer_orders.id','=',$id)->get();
    }

}
