<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\JsonDecoder;
use Validator;

class AccountController extends Controller
{
    public function Account()
    {
        $account_info = User::AccountInfo(2);
        $account_orders = User::OrderItems(2);

        $title = 'Account';

        return view('account', compact('account_info', 'account_orders', 'title'));
    }

    public function EditDetails()
    {
        $account_info = User::AccountInfo(1);

        $title = 'Edit Details';

        $countries = new JsonDecoder('http://country.io/names.json');

        return view('editdetails', compact('title', 'account_info', 'countries'));
    }

    public function UpdateDetails()
    {
        $validation_rules = [
        'firstname' => 'required',
        'surname' => 'required',
        'email' => 'required|email',
        'mobile_number' => 'required_without:phone_number',
        'phone_number' => 'required_without:mobile_number',
        'address_line_1' => 'required',
        'town' => 'required',
        'postcode' => 'required',
        'country' => 'required'
      ];

        $firstname = request('firstname');
        $middlename = request('middlename');
        $surname = request('surname');
        $email = request('email');
        $mobile_number = request('mobile_number');
        $phone_number = request('phone_number');

        $address_line1 = request('address_line_1');
        $address_line2 = request('address_line_2');
        $address_line3 = request('address_line_3');
        $town = request('town');
        $postcode = request('postcode');
        $county = request('county');
        $country = request('country');

        $validate = Validator::make(request()->all(), $validation_rules);

        if ($validate->fails()) {
            return redirect('account/edit-details')->withErrors($validate);
        } else {
            $update_account = User::UpdateCustomer(1,$firstname, $middlename, $surname, $email, $mobile_number, $phone_number, $address_line1, $address_line2=null, $address_line3=null, $town, $postcode, $county=null, $country);

            return redirect('account/edit-details')->with('success','Account Details Updated');
        }
    }

    public function ChangePassword()
    {
        return view('changepassword')->with('title', 'Change Password');
    }

    public function UpdatePassword()
    {
        $validation_rules = [
        'current_password' => 'required',
        'new_password' => 'required',
        'repeat_password' => 'required'
      ];

        $validate = Validator::make(request()->all(), $validation_rules);

        $current_password = request('current_password');
        $new_password = request('new_password');
        $repeat_password = request('repeat_password');

        if ($validate->fails()) {
            return redirect('account/change-password')->withErrors($validate);
        } else {
            if (strcmp($new_password, $repeat_password) == 0) {
                $password_hash = User::GetPassword(1);

                if (password_verify($current_password, $password_hash->password)) {
                    $new_password_hash = password_hash($repeat_password, PASSWORD_DEFAULT);
                    $update_password = User::UpdatePassword('1', $new_password_hash);
                    return redirect('account/change-password')->with('success', 'Password Changed');
                } else {
                    return redirect('account/change-password')->withErrors("Password Doesn't Match");
                }
            } else {
                return redirect('account/change-password')->withErrors("New Passwords Don't match");
            }
        }
    }
}
