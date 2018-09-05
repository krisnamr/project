<?php

namespace App\Http\Controllers\AuthKegiatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:kegiatan',['except'=>'Kegiatanlogout']);
    }

   
    public function showLoginForm()
    {
        return view('user1.login');
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
        if (Auth::guard('kegiatan')->attempt($credential, $request->remember)){
            // If login succesful, then redirect to their intended location
            return redirect()->intended(route('pajak.home'));
            
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function Kegiatanlogout()
    {
        Auth::guard('kegiatan')->logout();
        return redirect('pajak/login');
        
    }
}
