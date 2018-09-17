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
        return DB::table('customer_orders')->join('order_items', 'customer_orders.id', '=', 'order_id')->select('order_items.*', 'order_items.order_total as sub_total')->where('customer_orders.id', '=', $id)->get();
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

    public static function CheckAddress($address_line1, $town, $postcode)
    {
      return self::CustomerAddress()->where([['address_line1', '=', $address_line1],['town', '=', $town],['postcode', '=', $postcode]])->first();
    }

    public static function CheckAddressJunction($customer_id)
    {
      return self::AddressJunction()->where('customer_id','=', $customer_id)->first();
    }

    public static function CreateCustomer($firstname, $middlename, $surname, $email, $password, $mobile_number, $phone_number, $address_line1, $address_line2, $address_line3, $town, $postcode, $county, $country)
    {
        $customer_id = self::Customer()->insertGetId(['firstname' => $firstname, 'middlename' => $middlename,'surname' => $surname,'email' => $email,'password' => $password,'mobile_number' => $mobile_number, 'phone_number' => $phone_number, 'creation_date' => date('Y-m-d')]);
        if($address = self::CheckAddress($address_line1, $town, $postcode))
        {
          self::AddressJunction()->insert(['customer_id' => $customer_id,'address_id' => $address->id]);
        } else {
          $address_id = self::CustomerAddress()->insertGetId(['address_line1' => $address_line1,'address_line2' => $address_line2,'address_line3' => $address_line3,'town' => $town,'postcode' => $postcode,'county' => $county,'country' => $country]);
          self::AddressJunction()->insert(['customer_id' => $customer_id,'address_id' => $address_id]);
        }
    }

    public static function UpdateCustomer($customer_id, $firstname, $middlename, $surname, $email, $mobile_number, $phone_number, $address_line1, $address_line2, $address_line3, $town, $postcode, $county, $country)
    {
        self::Customer()->where('id', $customer_id)->update(['firstname' => $firstname, 'middlename' => $middlename,'surname' => $surname,'email' => $email,'mobile_number' => $mobile_number, 'phone_number' => $phone_number,'update_date' => date('Y-m-d')]);
        if($address = self::CheckAddress($address_line1, $town, $postcode))
        {
          if($junction = self::CheckAddressJunction($customer_id))
          {
            self::AddressJunction()->where('customer_id','=', $junction->customer_id)->delete();
          }
          self::AddressJunction()->insert(['customer_id' => $customer_id,'address_id' => $address->id]);
        } else {
          $address_id = self::CustomerAddress()->insertGetId(['address_line1' => $address_line1,'address_line2' => $address_line2,'address_line3' => $address_line3,'town' => $town,'postcode' => $postcode,'county' => $county,'country' => $country]);
          self::AddressJunction()->insert(['customer_id' => $customer_id,'address_id' => $address_id]);
        }
    }

    public static function GetPassword($customer_id)
    {
      return self::Customer()->select('password')->where('id','=', $customer_id)->first();
    }

    public static function UpdatePassword($customer_id, $new_password)
    {
      self::Customer()->where('id',$customer_id)->update(['password' => $new_password]);
    }

    public static function SearchCustomer($query)
    {
      return self::Customer()->where('id', '=', $query)->orWhere('email', 'like', '%'.$query.'%')->orWhere('surname', 'like', '%'.$query.'%')->get();
    }

    public static function DeleteCustomer($id)
    {
      self::Customer()->where('id','=', $id)->delete();
    }

    public static function CreateStaff($firstname, $middlename, $surname, $email, $password, $access_level)
    {
      DB::table('staff')->insert(['firstname' => $firstname,'middlename' => $middlename,'surname' => $surname,'email' => $email,'password' => $password,'access_level' => $access_level,'creation_date' => date('Y-m-d')]);
    }

    public static function SearchStaff($query)
    {
      return DB::table('staff')->where('id', '=', $query)->orWhere('email', 'like', '%'.$query.'%')->orWhere('surname', 'like', '%'.$query.'%')->get();
    }

    public static function DeleteStaff($id)
    {
      DB::table('staff')->where('id','=', $id)->delete();
    }

    public static function LogIn($email,$password)
    {
      return self::Customer()->where('email',$email)->where('password',$password)->first();
    }
}
