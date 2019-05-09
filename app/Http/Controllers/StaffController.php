<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Notifcation;
use App\Notifications\StaffCreation;


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

          //Notification::route('mail', $email)->notify(new StaffCreation("Your staff account has been created the password is .$gen_password. this password should be changed as soon as possible"));

          return redirect('admin/create-staff')->with('success', 'Account Created');
      }
    }

    public function SearchPage()
    {
      $search = null;

      $title = 'Staff Search';

      return view('staffsearch', compact('search', 'title'));
    }

    public function Search()
    {
      $validation_rules = [
        'query' => 'required',
      ];

      $query = request('query');

      $validate = Validator::make(request()->all(), $validation_rules);

      if ($validate->fails()) {
          return redirect('admin/staff-search')->withErrors($validate);
      } else {
          $search = User::SearchStaff($query);

          $title = 'Staff Search';

          return view('staffsearch', compact('search', 'title'));
      }

    }

    public function Edit($id)
    {
      $search = User::SearchStaff($id);

      //dd($staff);

      $title = 'Edit Staff';

      return view('editstaff', compact('search','title'));
    }

    public function Delete($id)
    {
      User::DeleteStaff($id);

      return redirect()->back()->withInput();
    }
}
