<?php

namespace App\Http\Controllers\AuthHonor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:honor',['except'=>'HonorLogout']);
    }

   
    public function showLoginForm()
    {
        return view('user2.dasbor.login');
    }

  
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Attempt to log the user in
        if (Auth::guard('honor')->attempt($credential, $request->remember)){
            // If login succesful, then redirect to their intended location
            return redirect()->intended(route('honor.home'));
            
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function HonorLogout()
    {
        Auth::guard('honor')->logout();
        return redirect('honor/login');
        
    }
}
