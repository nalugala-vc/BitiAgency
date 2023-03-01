<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;

class UserLoginController extends Controller
{
    protected $redirectTo = '/home';

    public function __construct()
    {
      $this->middleware('guest');
    }

    public function showLoginForm()
    {
      return view('auth.logReg');
    }

    public function login(Request $request)
    {
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:4'
      ]);
      $password='secret';
      $user=User::where('id',5)->first();
      $hashed = $user->password;

    //   if (Hash::check($password, $hashed)) {
    //     dd('they match '.$hashed);
    // }else{
    //     echo($hashed);
    //     dd('they dont match '.$hashed);
    // }


      if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
        return redirect()->intended(route('home'));
      }

    
      return redirect()->back()->with('error','Credentials do not match or records');
    }
}
