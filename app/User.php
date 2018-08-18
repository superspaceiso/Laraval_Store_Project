<?php

namespace App;

use Illuminate\Support\Facades\DB;

class User
{
    public static function AccountInfo($id)
    {
      return DB::table('customer')->join('customer_address', 'customer.id', '=', 'customer_address.customer_id')->join('customer_addresses', 'customer_addresses.id','=','customer_address.address_id')->select('customer.id','customer.firstname','customer.middlename','customer.surname','customer.email','customer_addresses.*')->where('customer.id','=',$id)->get();
    }

    public static function AccountOrders($id)
    {
      
    }

}
