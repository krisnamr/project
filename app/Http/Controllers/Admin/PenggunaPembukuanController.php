<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UserPembukuan;

class PenggunaPembukuanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
   
       public function create(){
           return view('admins.akunpembukuan.create');
       }
   
       public function store(Request $request){
           $this->validateInput($request);
            UserPembukuan::create([
               'fullname' => $request['fullname'],
               'email'=>$request['email'],
               'jabatan'=>$request['jabatan'],
               'password'=>bcrypt($request['password']),
               
           ]);
   
           return redirect('admin/akunhonor');
       }
   
       public function show(){
          
       }
   
       public function edit($id)
       {
           $user1 = UserPembukuan::findOrFail($id);
   
           return view('admins/akunpembukuan/edit', ['user1' => $user1]);
       }
   
       public function update(Request $request, $id)
       {
           $kegiatans = UserPembukuan::FindOrFail($id);
           $constraints = [
               'fullname' => 'required|max:20',
               'email'=> 'required|max:60',
               'jabatan' => 'required|max:60',
              
               ];
           $input = [
               'fullname' => $request['fullname'],
               'email' => $request['email'],
               'jabatan' => $request['jabatan'],
               'password'=>bcrypt($request['password']),
              
           ];
           
           $this->validate($request, $constraints);
           UserPembukuan::where('id', $id)
               ->update($input);
           
           return redirect('admin/akunhonor');
       }
   
       public function destroy($id)
       {
           $user1=UserPembukuan::findOrFail($id);
           $user1 ->delete();
           return redirect()->intended('admin/akunhonor');
          
       }
   
       private function validateInput($request) {
           $this->validate($request, [
           'fullname' => 'required|max:20',
           'email' => 'required|email|max:255|unique:user_pembukuan',
           'password' => 'required|min:6|confirmed',
           'jabatan' => 'required|max:60',
           
       ]);
       }
   
}
