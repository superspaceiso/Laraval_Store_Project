<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class StaffController extends Controller
{
  public function CreatePage()
  {
    return view('createstaff')->with('title', 'Create Staff Member');
  }

  public function StoreData()
  {
    $this->validate(request(),[
      'staff_firstname' => 'required',
      'staff_surname' => 'required',
      'staff_email' => 'required|email',
      'access_level' => 'required|numeric'
    ]);

    $new_staff = User::CreateStaff(request('staff_firstname'), request('staff_middlename'), request('staff_surname'), request('staff_email'), request('access_level'));

    return view('createstaff')->with('title', 'Create Staff Member');
  }
}
