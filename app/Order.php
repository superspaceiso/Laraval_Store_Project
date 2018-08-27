<?php

namespace App;

use Illuminate\Support\Facades\DB;

class Order
{
    public static function CustomerOrders()
    {
        return DB::table('customer_orders')->join('customer', 'customer.id', '=', 'customer_id')->join('customer_address', 'customer.id', '=', 'customer_address.customer_id')->join('customer_addresses', 'customer_addresses.id', '=', 'customer_address.address_id')->select('customer_orders.*', 'customer.firstname', 'customer.middlename', 'customer.surname', 'customer.email', 'customer.mobile_number', 'customer.phone_number', 'customer_addresses.address_line1', 'customer_addresses.address_line2', 'customer_addresses.address_line3', 'customer_addresses.town', 'customer_addresses.postcode', 'customer_addresses.county', 'customer_addresses.country');
    }

    public static function ShippedOrders()
    {
        return self::CustomerOrders()->whereNotNull('customer_orders.shipped_date')->get();
    }

    public static function UnshippedOrders()
    {
        return self::CustomerOrders()->whereNull('customer_orders.shipped_date')->get();
    }

    public static function SearchOrder($order_id)
    {
        return self::CustomerOrders()->where('customer_orders.id', '=', $order_id)->get();
    }

    public static function Count()
    {
        return DB::table('customer_orders');
    }

    public static function CountUnshipped()
    {
        return self::Count()->whereNull('shipped_date')->count();
    }

    public static function CountShipped()
    {
        return self::Count()->whereNotNull('shipped_date')->count();
    }

    public static function Items($id)
    {
        return DB::table('customer_orders')->join('order_items', 'customer_orders.id', '=', 'order_id')->select('order_items.*', 'order_items.order_total as sub_total')->where('customer_orders.id', '=', $id)->get();
    }

    public static function OutstandingOrders()
    {
        $orders = [];
        foreach (self::UnshippedOrders() as $Order) {
            $orders[$Order->id]['firstname'] = $Order->firstname;
            $orders[$Order->id]['middlename'] = $Order->middlename;
            $orders[$Order->id]['surname'] = $Order->surname;

            $orders[$Order->id]['email'] = $Order->email;
            $orders[$Order->id]['mobile_number'] = $Order->mobile_number;
            $orders[$Order->id]['phone_number'] = $Order->phone_number;

            $orders[$Order->id]['address_line1'] = $Order->address_line1;
            $orders[$Order->id]['address_line2'] = $Order->address_line2;
            $orders[$Order->id]['address_line3'] = $Order->address_line3;
            $orders[$Order->id]['town'] = $Order->town;
            $orders[$Order->id]['postcode'] = $Order->postcode;
            $orders[$Order->id]['county'] = $Order->county;
            $orders[$Order->id]['country'] = $Order->country;

            $orders[$Order->id]['order_id'] = $Order->id;
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
}
