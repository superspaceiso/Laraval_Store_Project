<?php

namespace App;

use Illuminate\Support\Facades\DB;

class User
{
    public static function Customer()
    {
      return DB::table('customer');
    }

    public static function CustomerAddress()
    {
      return DB::table('customer_addresses');
    }

    public static function AddressJunction()
    {
      return DB::table('customer_address');
    }

    public static function AccountInfo($id)
    {
        return self::Customer()->join('customer_address', 'customer.id', '=', 'customer_address.customer_id')->join('customer_addresses', 'customer_addresses.id', '=', 'customer_address.address_id')->select('customer.id', 'customer.firstname', 'customer.middlename', 'customer.surname', 'customer.email', 'customer.mobile_number', 'customer.phone_number', 'customer_addresses.*')->where('customer.id', '=', $id)->get();
    }

    public static function Orders($id)
    {
        return DB::table('customer_orders')->select('customer_orders.*')->where('customer_orders.customer_id', '=', $id)->get();
    }

    public static function Items($id)
    {
        return self::Customer()->join('order_items', 'customer_orders.id', '=', 'order_id')->select('order_items.*', 'order_items.order_total as sub_total')->where('customer_orders.id', '=', $id)->get();
    }

    public static function OrderItems($id)
    {
        $orders = [];
        foreach (self::Orders($id) as $Order) {
            $orders[$Order->id]['order_date'] = $Order->order_date;
            $orders[$Order->id]['order_total'] = $Order->order_total;
            $orders[$Order->id]['shipped_date'] = $Order->shipped_date;
            foreach (self::Items($Order->id) as $OrderItems) {
                $orders[$Order->id]['items'][$OrderItems->id]['product_name'] = $OrderItems->product_name;
                $orders[$Order->id]['items'][$OrderItems->id]['product_id'] = $OrderItems->product_id;
                $orders[$Order->id]['items'][$OrderItems->id]['quantity'] = $OrderItems->item_quantity;
                $orders[$Order->id]['items'][$OrderItems->id]['sub_total'] = $OrderItems->order_total;
            }
        }
        return $orders;
    }

  public static function CreateUser($firstname,$middlename,$surname,$email,$password,$mobile_number,$phone_number,$address_line1,$address_line2,$address_line3,$town,$postcode,$county,$country)
  {
    $customer_id = self::Customer(['firstname' => $firstname, 'middlename' => $middlename,'surname' => $surname,'email' => $email,'password' => $password,'mobile_number' => $mobile_number, 'phone_number' => $phone_number])->insertGetId();
    $address_id = self::CustomerAddress(['address_line1' => $address_line1,'address_line2' => $address_line2,'address_line3' => $address_line3,'town' => $town,'postcode' => $postcode,'county' => $county,'country' => $country])->insertGetId();
    self::AddressJunction()->insert(['customer_id' => $customer_id,'address_id' => $address_id]);
  }

  public static function UpdateUser($id,$firstname,$middlename,$surname,$email,$password,$mobile_number,$phone_number,$address_line1,$address_line2,$address_line3,$town,$postcode,$county,$country)
  {
    self::Customer()->where('id',$id)->update(['firstname' => $firstname, 'middlename' => $middlename,'surname' => $surname,'email' => $email,'password' => $password,'mobile_number' => $mobile_number, 'phone_number' => $phone_number]);
  }

  public static function DeleteUser()
  {
    self::Customer()->where('id',$id)->delete();
  }
}
