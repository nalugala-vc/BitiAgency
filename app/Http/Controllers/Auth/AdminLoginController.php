<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
    protected $redirectTo = '/adminHome';

    public function __construct()
    {
      $this->middleware('guest:admins');
    }

    public function showLoginForm()
    {
      return view('auth.adminLogin');
    }

    public function login(Request $request)
    {
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:8'
      ]);

      $hashed = DB::table('admins')->where('id',1)->value('password');

      if (Auth::guard('admins')->attempt(['email' => $request->email, 'password' => $request->password])) {
        return redirect()->intended(route('admin'));
      }

    
      return redirect()->back()->withInput($request->only('email'));
    }
}
