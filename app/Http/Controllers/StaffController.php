<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;

class StaffController extends Controller
{
  public function CreatePage()
  {
    return view('createstaff')->with('title', 'Create Staff Member');
  }

  public function CreateStaff()
  {
      $validation_rules =[
        'staff_firstname' => 'required',
        'staff_surname' => 'required',
        'staff_email' => 'required|email',
        'access_level' => 'required|numeric'
      ];

      $firstname = request('staff_firstname');
      $middlename = request('staff_middlename');
      $surname = request('staff_surname');
      $email = request('staff_email');
      $access_level = request('access_level');

      $validate = Validator::make(request()->all(), $validation_rules);

      if ($validate->fails()) {
          return redirect('admin/create-staff')->withErrors($validate);
      } else {

          $gen_password = str_random(12);
          $password = password_hash($gen_password, PASSWORD_DEFAULT);

          $new_staff = User::CreateStaff($firstname, $middlename, $surname, $email, $password, $access_level);

          return redirect('admin/create-staff')->with('success', 'Account Created');
      }
    }
}
