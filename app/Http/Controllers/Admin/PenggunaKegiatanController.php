<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UserKegiatan;

class PenggunaKegiatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
     $user1 = UserKegiatan::paginate(5); 
     $jumlah1= UserKegiatan::count();
     $numbers=0;
     return view('admins/akun/index',['user1'=>$user1,'user2'=>$user2,
     'jumlah1'=>$jumlah1,'jumlah2'=>$jumlah2,'numbers'=>$numbers]);  
       }
   
       public function create(){
           return view('admins.akunkegiatan.create');
       }
   
       public function store(Request $request){
           $this->validateInput($request);
            UserKegiatan::create([
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
           $user1 = UserKegiatan::findOrFail($id);
   
           return view('admins/akunkegiatan/edit', ['user1' => $user1]);
       }
   
       public function update(Request $request, $id)
       {
           $kegiatans = UserKegiatan::FindOrFail($id);
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
           UserKegiatan::where('id', $id)
               ->update($input);
           
           return redirect('admin/akunhonor');
       }
   
       public function destroy($id)
       {
           $user1=UserKegiatan::findOrFail($id);
           $user1 ->delete();
           return redirect()->intended('admin/akunhonor');
          
       }
   
       private function validateInput($request) {
           $this->validate($request, [
           'fullname' => 'required|max:20',
           'email' => 'required|email|max:255|unique:user_kegiatans',
           'password' => 'required|min:6|confirmed',
           'jabatan' => 'required|max:60',
           
       ]);
       }
   
}
